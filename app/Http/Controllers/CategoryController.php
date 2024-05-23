<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function TagListPermissions()
    {
        $TagListPermissions = [
            'users' => Auth::user()->can('user-list'),
            'roles' => Auth::user()->can('role-list'),
            'permissions' => Auth::user()->can('permission-list'),
            'category' => Auth::user()->can('category-list'),
            'brand' => Auth::user()->can('brand-list')
        ];
        return $TagListPermissions;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $skip = max(0, (int) $request->input('skip', 0)); // Ensure non-negative skip value
        $take = $request->input('take', 25) === 'All' ? null : min(1000, (int) $request->input('take', 25)); // Limit max take value for safety

        $categories = DB::table('categories as c')
            ->select('c.*', DB::raw('p.category_name as parent_category_name')) // Use DB::raw for clarity
            ->leftJoin('categories as p', 'p.id', '=', 'c.parent_category'); // Consider LEFT JOIN for inactive parents

        if ($request->search !== null && $request->search !== '') {
            $search = strtolower($request->search);
            $categories->where(function ($query) use ($search) {
                $query->where('p.category_name', 'like', "%{$search}%")
                    ->orWhere('c.category_name', 'like', "%{$search}%");
            });
        }

        $categories = $categories->where('c.active', 1);
        $categories = $categories->where('c.is_deleted', 0);
        $categories = $categories->where('c.parent_category', '<>', 0);

        $total = $categories->count();

        if ($take !== 'All') {
            $categories = $categories->skip($skip)->take($take);
        }

        $categories = $categories->orderBy('parent_category_name', 'ASC');

        $categories = $categories->get();

        $parentCategories = Category::select('id', 'category_name')->where('parent_category', 0)->get();
        $getTagListPermissions = $this->TagListPermissions();

        if ($request->has('take')) {
            return response()->json([
                'status' => true,
                'tableRows' => $this->filterTableData($categories->toArray()),
                'total' => $total,
                'record' => (string) $take,
                'parentCategories' => $parentCategories,
                'can' => [
                    'list' => $getTagListPermissions,
                ]
            ]);
        } else {
            return Inertia::render('Category/Category', [
                'tableRows' => $this->filterTableData($categories->toArray()),
                'total' => $total,
                'record' => (string) $take,
                'parentCategories' => $parentCategories,
                'can' => [
                    'list' => $getTagListPermissions,
                ]
            ]);
        }
    }

    public function filterTableData($products)
    {
        $filteredProducts = array_map(function ($product) {
            return [
                'Category' => $product->category_name,
                'Parent' => $product->parent_category_name,
                'buttons' => $product->id,
            ];
        }, $products);
        return $filteredProducts;
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category = new Category();
        $category->category_name = $validatedData['name'];
        $category->parent_category = $validatedData['parent_id'] ?? 0;
        $category->save();

        return response()->json(['message' => 'Category saved successfully'], 201);
    }

    public function edit($id) {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json(['status' => true, 'data' => $category], 200);
    }

    public function update(Request $request, $id) {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id', // Assuming categories are stored in a table called "categories"
        ]);

        $category->category_name = $validatedData['name'];
        $category->parent_category = $validatedData['parent_id'];
        $category->save();

        return response()->json(['message' => 'Category updated successfully', 'data' => $category], 200);
    }

    public function destory(Request $request, $id) {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $category->is_deleted = true;
        $category->active = false;
        $category->save();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}
