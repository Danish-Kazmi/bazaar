<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function TagListPermissions()
    {
        $TagListPermissions = [
            'users' => Auth::user()->roles()->first()->hasPermissionTo('user-list'),
            'roles' => Auth::user()->roles()->first()->hasPermissionTo('role-list'),
            'permissions' => Auth::user()->roles()->first()->hasPermissionTo('permission-list'),
            'category' => Auth::user()->roles()->first()->hasPermissionTo('category-list'),
            'brand' => Auth::user()->roles()->first()->hasPermissionTo('brand-list'),
            'product' => Auth::user()->roles()->first()->hasPermissionTo('product-list')
        ];
        return $TagListPermissions;
    }

    public function index(Request $request)
    {
        $skip = max(0, (int) $request->input('skip', 0));
        $take = $request->input('take', 25) === 'All' ? null : min(1000, (int) $request->input('take', 25));

        $brands = DB::table('brands as b')
            ->select('b.*', DB::raw('GROUP_CONCAT(sc.category_name SEPARATOR ", ") as sub_categories_names'))
            ->leftJoin('brand_sub_category as bs', 'bs.brand_id', '=', 'b.id')
            ->leftJoin('categories as sc', 'sc.id', '=', 'bs.sub_category_id')
            ->groupBy('b.id');

        if ($request->search !== null && $request->search !== '') {
            $search = strtolower($request->search);
            $brands->where(function ($query) use ($search) {
                $query->where('b.brand_name', 'like', "%{$search}%");
            });
        }

        $brands = $brands->where('b.active', 1);
        $brands = $brands->where('b.is_deleted', 0);

        $total = $brands->pluck('id')->count();

        if ($take !== 'All') {
            $brands = $brands->skip($skip)->take($take);
        }
        
        $brands = $brands->orderBy('b.brand_name', 'ASC')->get();

        $brands->transform(function ($brand) {
            if ($brand->brand_logo) {
                $brand->brand_logo_url = Storage::url('brand_logos/' . $brand->brand_logo);
            } else {
                $brand->brand_logo_url = Storage::url('product_images/demo.jpeg'); // Or a default image URL if preferred
            }
            return $brand;
        });

        $permissions = $this->TagListPermissions();

        if ($request->has('take')) {
            return response()->json([
                'status' => true,
                'tableRows' => $this->filterTableData($brands->toArray()),
                'total' => $total,
                'record' => (string) $take,
                'can' => ['list' => $permissions],
            ]);
        } else {
            return Inertia::render('Brand/Brand', [
                'tableRows' => $this->filterTableData($brands->toArray()),
                'total' => $total,
                'record' => (string) $take,
                'can' => ['list' => $permissions],
            ]);
        }
    }

    public function filterTableData($brands)
    {
        return array_map(function ($brand) {
            return [
                'Brand' => $brand->brand_name,
                'image' => $brand->brand_logo_url,
                'SubCategories' => $brand->sub_categories_names,
                'buttons' => $brand->id,
            ];
        }, $brands);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_logo' => 'nullable|image',
            'sub_categories' => 'nullable|string'
        ]);

        $brand = new Brand();
        $brand->brand_name = $validatedData['brand_name'];

        if ($request->hasFile('brand_logo')) {
            $path = $request->file('brand_logo')->store('public/brand_logos');
            $brand->brand_logo = basename($path);
        }

        $brand->save();
        if ($request->filled('sub_categories')) {
            $subCategories = json_decode($validatedData['sub_categories'], true);
            $brand->subCategories()->sync($subCategories);
        }
    

        return response()->json(['message' => 'Brand saved successfully'], 201);
    }

    public function edit($id)
    {
        $brand = Brand::with('subCategories')->find($id);

        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }
        
        return response()->json(['status' => true, 'data' => $brand], 200);
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:255',
            'sub_categories' => 'nullable|string'
        ]);

        $brand->brand_name = $validatedData['brand_name'];

        if ($request->hasFile('brand_logo')) {
            if ($brand->brand_logo) {
                Storage::delete('public/brand_logos/' . $brand->brand_logo);
            }
            $path = $request->file('brand_logo')->store('public/brand_logos');
            $brand->brand_logo = basename($path);
        }

        $brand->save();
        if ($request->filled('sub_categories')) {
            $subCategories = json_decode($validatedData['sub_categories'], true);
            $brand->subCategories()->sync($subCategories);
        }
    
        return response()->json(['message' => 'Brand updated successfully', 'data' => $brand], 200);
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        $brand->active = false;
        $brand->is_deleted = true;
        $brand->save();

        return response()->json(['message' => 'Brand deleted successfully'], 200);
    }

    public function get_brands_by_category($cate)
    {
        if (Category::find($cate)->count() == 0) {
            return response()->json(['error'=> 'Category does not exist'],404);
        }

        // Fetch brands based on the selected category
        $brands = Brand::where('active', 1)->where('is_deleted', 0)->whereHas('subCategories', function ($query) use ($cate) {
            $query->where('sub_category_id', $cate);
        })->get();

        // Return the brands as JSON response
        return response()->json($brands);
    }
}
