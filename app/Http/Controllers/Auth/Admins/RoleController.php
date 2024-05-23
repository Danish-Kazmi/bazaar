<?php

namespace App\Http\Controllers\Auth\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:role-list', ['only' => ['index']]);
        $this->middleware('can:role-create', ['only' => ['create', 'store']]);
        $this->middleware('can:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:role-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request) {
        $skip = $request->input('skip', 0); // Default to 25 if not provided
        $take = $request->input('take', 25); // Default to 25 if not provided
        $roles = Role::orderBy('id', 'DESC');
        if ($request->search != null && $request->search != '') {
            $search = strtolower($request->search);
            $roles = $roles->where(function ($query) use ($search) {
                $query->where('id', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%");
            });
        }
        $total = $roles->count();
        if ($take != 'All') {
            $roles = $roles->skip($skip)->take($take);
        }
        $roles = $roles->get();
        $permissions = Permission::all();
        if ($request->has('take')) {
            $filterTable = $this->filterTableData($roles->toArray());
            return response()->json([
                'status' => true,
                'tableRows' => $filterTable,
                'total' => $total,
                'record' => (string) $take,
            ]);
        } else {
            $getTagListPermissions = $this->TagListPermissions();
            return Inertia::render('Roles/roles',[
                'roles' => $roles,
                'permissions' => $permissions,
                'can' => [
                    'create' => Auth::user()->can('role-create'),
                    'edit' => Auth::user()->can('role-edit'),
                    'delete' => Auth::user()->can('role-delete'),
                    'list' => $getTagListPermissions,
                ]
            ]);
        }
    }
    public function TagListPermissions() {
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
    public function store(Request $request) {
        $request->validate([
            'role_name' => 'required|max:255',
            'permissions' => 'required',
        ]);
        $role = Role::create([
            'name' => $request->role_name,
        ]);
        $role->syncPermissions($request->permissions);
        return redirect(route('roles'));
    }
    public function update(Request $request) {
        $request->validate([
            'role_name' => 'required|max:255',
            'permissions' => 'required',
        ]);
        $role = Role::findOrFail($request->id);
        $role->update([
            'name' => $request->role_name,
        ]);
        $role->syncPermissions($request->permissions);
        return redirect(route('roles'));
    }
    public function destroy(Request $request)
    {
        $role = Role::findOrFail($request->id);
        $role->delete();
        return redirect(route('roles'));
    }
    public function filterTableData($roles)
    {
        // Create a new array with only the desired keys/values
        $filteredProducts = array_map(function ($roles) {
            return [
                'id' => $roles['id'] ?? '',
                'name' => $roles['name'] ?? '',
                'permissions_count' => $roles['permissions_count'] ?? '',
            ];
        }, $roles);
        return $filteredProducts;
    }
}
