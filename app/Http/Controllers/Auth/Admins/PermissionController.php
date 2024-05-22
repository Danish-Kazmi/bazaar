<?php

namespace App\Http\Controllers\Auth\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:permission-list', ['only' => ['index']]);
        $this->middleware('can:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('can:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:permission-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request) {
        $skip = $request->input('skip', 0); // Default to 25 if not provided
        $take = $request->input('take', 25); // Default to 25 if not provided
        $permissions = Permission::orderBy('id', 'DESC');
        if ($request->search != null && $request->search != '') {
            $search = strtolower($request->search);
            $permissions = $permissions->where(function ($query) use ($search) {
                $query->where('id', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%");
            });
        }
        $total = $permissions->count();
        if ($take != 'All') {
            $permissions = $permissions->skip($skip)->take($take);
        }
        $permissions = $permissions->get();
        if ($request->has('take')) {
            $filterTable = $this->filterTableData($permissions->toArray());
            return response()->json([
                'status' => true,
                'tableRows' => $filterTable,
                'total' => $total,
                'record' => (string) $take,
            ]);
        } else {
            $getTagListPermissions = $this->TagListPermissions();
            return Inertia::render('Permissions/permissions',[
                'permissions' => $permissions,
                'can' => [
                    'create' => Auth::user()->can('permission-create'),
                    'edit' => Auth::user()->can('permission-edit'),
                    'delete' => Auth::user()->can('permission-delete'),
                    'list' => $getTagListPermissions,

                ]
            ]);
        }
    }
    public function TagListPermissions() {
        $TagListPermissions = [
                'users' => Auth::user()->can('user-list'),
                'roles' => Auth::user()->can('role-list'),
                'permissions' => Auth::user()->can('permission-list')
             ];
        return $TagListPermissions;
     }
    public function store(Request $request) {
        $request->validate([
            'permission_name' => 'required|max:255',
        ]);
        Permission::create([
            'name' => $request->permission_name,
        ]);
        return redirect(route('permissions'));
    }
    public function filterTableData($permissions)
    {
        // Create a new array with only the desired keys/values
        $filteredProducts = array_map(function ($permissions) {
            return [
                'id' => $permissions['id'] ?? '',
                'name' => $permissions['name'] ?? '',
            ];
        }, $permissions);
        return $filteredProducts;
    }
}
