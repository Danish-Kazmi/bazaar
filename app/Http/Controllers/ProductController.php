<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function TagListPermissions()
    {
        $TagListPermissions = [
            'users' => Auth::user()->can('user-list'),
            'roles' => Auth::user()->can('role-list'),
            'permissions' => Auth::user()->can('permission-list'),
            'category' => Auth::user()->can('category-list'),
            'brand' => Auth::user()->can('brand-list'),
            'product' => Auth::user()->can('product-list')
        ];
        return $TagListPermissions;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $skip = $request->input('skip', 0); // Default to 25 if not provided
        $take = $request->input('take', 25); // Default to 25 if not provided
        
        $products = DB::table('products')
            ->select(
                'products.id as id',
                'products.product_id as Product_Code',
                'products.product_name as Product_Name',
                'categories.category_name as Category',
                'brands.brand_name as Brand',
                'products.model as Model',
                'products.price as Price',
                'products.sale_price as Sale_Price',
                'products.stock as Stock',
                'products.new_arrival as New_Arrival',
                'users.name as Owner',
                DB::raw('(SELECT product_images.image_path FROM product_images WHERE product_images.product_id = products.id LIMIT 1) as Image')
            )
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->leftJoin('users', 'products.added_by', '=', 'users.id')
            ->groupBy('products.id', 'categories.category_name', 'brands.brand_name', 'users.name');
    
        if ($request->search != null && $request->search != '') {
            $search = strtolower($request->search);
            $products = $products->where(function ($query) use ($search) {
                $query->where('products.product_id', 'like', "%{$search}%")
                    ->orWhere('products.product_name', 'like', "%{$search}%")
                    ->orWhere('categories.category_name', 'like', "%{$search}%")
                    ->orWhere('brands.brand_name', 'like', "%{$search}%")
                    ->orWhere('products.model', 'like', "%{$search}%")
                    ->orWhere('products.price', 'like', "%{$search}%")
                    ->orWhere('products.sale_price', 'like', "%{$search}%")
                    ->orWhere('products.stock', 'like', "%{$search}%")
                    ->orWhere('users.name', 'like', "%{$search}%");
            });
        }

        $products = $products->where('products.active', 1);
        $products = $products->where('products.is_deleted', 0);

        $total = $products->count();

        if ($take != 'All') {
            $products = $products->skip($skip)->take($take);
        }
        $products = $products->get();
        
        $products->transform(function ($product) {
            if ($product->Image) {
                $product->Image = Storage::url($product->Image);
            } else {
                $product->Image = Storage::url('product_images/demo.jpeg'); // Or a default image URL if preferred
            }
            if ($product->New_Arrival) {
                $product->New_Arrival = 'Yes';
            } else {
                $product->New_Arrival = 'No'; // Or a default image URL if preferred
            }
            return $product;
        });

        $filterTable = $this->filterTableData($products->toArray());
        $permissions = $this->TagListPermissions();
        if ($request->has('take')) {
            return response()->json([
                'status' => true,
                'tableRows' => $filterTable,
                'total' => $total,
                'record' => (string) $take,
                'can' => ['list' => $permissions],
            ]);
        } else {
            return Inertia::render('Product/Product', [
                'tableRows' => $filterTable,
                'total' => $total,
                'record' => (string) $take,
                'can' => ['list' => $permissions],
            ]);
        }
    }

    public function filterTableData($products)
    {
        // Create a new array with only the desired keys/values
        return array_map(function ($product) {
            return [
                'image' => $product->Image,
                'Product_Code' => $product->Product_Code,
                'Product_Name' => $product->Product_Name,
                'Category' => $product->Category,
                'Brand' => $product->Brand,
                'Model' => $product->Model,
                'Sale_Price' => $product->Sale_Price,
                'Price' => $product->Price,
                'Stock' => $product->Stock,
                'New_Arrival' => $product->New_Arrival,
                'Owner' => $product->Owner,
                'buttons' => $product->id,
            ];
        }, $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'product_id' => 'required|unique:products',
            'product_name' => 'required',
            'price' => 'required|numeric|min:0',
            'image_path_*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation as needed
        ]);
        
        // Create new product instance and save to database
        $product = Product::create([
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'model' => $request->model,
            'stock' => $request->stock,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'added_by' => Auth::id(),
            'active' => true,
            'is_deleted' => false,
        ]);

        // Handle multiple images
        foreach ($request->file() as $key => $file) {
            if (strpos($key, 'image_path_') === 0) {
                $path = $file->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->image_paths = $product->images->pluck('image_path')->map(function ($path) {
            return Storage::url($path);
        })->toArray();

        return response()->json(['status' => true, 'data' => $product], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming request data
        $request->validate([
            'product_id' => 'required|unique:products,product_id,' . $id,
            'product_name' => 'required',
            'price' => 'required|numeric|min:0',
            'image_path_*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation as needed
        ]);

        // Find the product by id
        $product = Product::findOrFail($id);

        // Update product details
        $product->update([
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'model' => $request->model,
            'stock' => $request->stock,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
        ]);
            
        if ($request->hasFile('image_path_')) {
            // Existing images in the database
            $existingImages = $product->images->pluck('image_path')->toArray();

            // Get new image paths from the request
            $newImagePaths = [];

            foreach ($request->file() as $key => $file) {
                if (strpos($key, 'image_path_') === 0) {
                    $path = $file->store('product_images', 'public');
                    $newImagePaths[] = $path;
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path,
                    ]);
                }
            }

            // Determine which images need to be deleted
            $imagesToDelete = array_diff($existingImages, $newImagePaths);

            // Delete the images from storage and database
            foreach ($imagesToDelete as $image) {
                // Remove the image file from storage
                Storage::disk('public')->delete($image);

                // Remove the image entry from the database
                ProductImage::where('image_path', $image)->delete();
            }
        }

        return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->is_deleted = true;
        $product->active = false;
        $product->save();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
