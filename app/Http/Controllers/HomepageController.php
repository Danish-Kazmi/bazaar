<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HomepageController extends Controller
{
    public function index()
    {
        return Inertia::render('Bazaar/Homepage');
    }
    public function pros()
    {
        return Inertia::render('Bazaar/Pros');
            // case 'rating_high_low':
            //     $productsQuery->orderBy('rating', 'desc');
            //     break;
            // case 'rating_low_high':
            //     $productsQuery->orderBy('rating', 'asc');
            //     break;
    }
    public function products(Request $request)
    {
        $categoryId = $request->query('category_id');
        // Fetch the category along with its subcategories
        $category = Category::with('subCategories')->find($categoryId);
        if ($category) {
            // Get all the category IDs including subcategories
            $categoryIds = $category->subCategories->pluck('id')->push($categoryId);
            // Fetch all brands related to these categories
            $brands = Brand::whereHas('subCategories', function ($query) use ($categoryIds) {
                $query->whereIn('categories.id', $categoryIds);
            })->where('is_deleted', 0)->get();
        } else {
            // Fetch random brands if category is not found
            $brands = Brand::where('is_deleted', 0)->inRandomOrder()->take(10)->get();
        }
    
        $brands->transform(function ($brand) {
            $brand->Image = $brand->brand_logo ? Storage::url('brand_logos/'.$brand->brand_logo) : Storage::url('product_images/demo.jpeg'); // Default image URL
            return $brand;
        });
        return Inertia::render('Bazaar/Products', [
            'category_id' => $categoryId,
            'brands' => $brands,
        ]);
    }
    public function getProducts(Request $request)
    {
        $skip = $request->get('skip', 0);
        $take = $request->get('take', 12); // Default to 12 items per page
        $search = $request->get('search', '');
        $sort = $request->get('sort', 'default'); // Add sorting parameter
        $category_id = $request->get('category_id');
        $brand_id = $request->get('brand_id');
        $minPrice = $request->get('min_price', 0); // Default to 0 if not provided
        $maxPrice = $request->get('max_price', 999999);
        if ($minPrice > $maxPrice) {
            $temp = $minPrice;
            $minPrice = $maxPrice;
            $maxPrice = $temp;
        }
    
        $productsQuery = DB::table('products')
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
                DB::raw('(SELECT product_images.image_path FROM product_images WHERE product_images.product_id = products.id LIMIT 1) as Image1'),
                DB::raw('(SELECT product_images.image_path FROM product_images WHERE product_images.product_id = products.id LIMIT 1,1) as Image2')
            )
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->leftJoin('users', 'products.added_by', '=', 'users.id')
            ->where('products.active', 1)
            ->where('products.is_deleted', 0)
            ->whereBetween('products.price', [$minPrice, $maxPrice])
            ->groupBy('products.id', 'categories.category_name', 'brands.brand_name', 'users.name');
    
        // Apply search filter
        if ($category_id) {
            $productsQuery->where('products.category_id', $category_id);
        }
        if ($brand_id) {
            $productsQuery->where('products.brand_id', $brand_id);
        }
        if ($search) {
            $search = strtolower($search);
            $productsQuery->where(function ($query) use ($search) {
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
        // Apply sorting
        switch ($sort) {
            case 'name_asc':
                $productsQuery->orderBy('products.product_name', 'asc');
                break;
            case 'name_desc':
                $productsQuery->orderBy('products.product_name', 'desc');
                break;
            case 'price_low_high':
                $productsQuery->orderBy('products.price', 'asc');
                break;
            case 'price_high_low':
                $productsQuery->orderBy('products.price', 'desc');
                break;
            default:
                // Default sorting can be applied here if needed
                break;
        }

        $total = $productsQuery->count();

        if ($take != 'All') {
            $productsQuery->skip($skip)->take($take);
        }

        $products = $productsQuery->get();

        $products->transform(function ($product) {
            $product->Image1 = $product->Image1 ? Storage::url($product->Image1) : Storage::url('product_images/demo.jpeg'); // Default image URL
            $product->Image2 = $product->Image2 ? Storage::url($product->Image2) : $product->Image1;
            $product->New_Arrival = $product->New_Arrival ? 'Yes' : 'No';
            return $product;
        });

        return response()->json(['total' => $total, 'products' => $products]);
    }

    public function singleProduct(Request $request, $product_id)
    {
        $product = Product::with('images', 'category', 'category.parentCategory', 'brand')->findOrFail($product_id);
        // Transform the image paths
        $product->images->transform(function ($image) {
            // Use a default image if image_path is empty
            $image->path = $image->image_path 
                ? Storage::url($image->image_path) 
                : Storage::url('product_images/demo.jpeg');
            return $image;
        });
        return Inertia::render('Bazaar/SingleProduct', [
            'product'=> $product,
        ]);
    }
    public function contact_us()
    {
        return Inertia::render('Bazaar/ContactUs');
    }
    public function aboutUs()
    {
        return Inertia::render('Bazaar/AboutUs');
    }
    public function contact_email(Request $request)
    {
        $contact_user = $request->all();
        Mail::to($request->contactEmail)->send(new \App\Mail\contactMail($contact_user));
        return redirect()->back();
    }
}
