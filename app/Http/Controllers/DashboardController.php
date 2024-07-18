<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function dashboard()
    {
        $getTagListPermissions = $this->TagListPermissions();
        $roles = Role::count();
        $users = User::count();
        $permissions = Permission::count();
        $products_get = Product::where('added_by',Auth::user()->id)->get();
        $products = $products_get->count();
        $brands = Brand::count();
        return Inertia::render('Dashboard', [
            'roles' => $roles,
            'users' => $users,
            'permissions' => $permissions,
            'products' => $products,
            'brands' => $brands,
            'can' => [
                'list' => $getTagListPermissions,
            ]
        ]);
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
}
