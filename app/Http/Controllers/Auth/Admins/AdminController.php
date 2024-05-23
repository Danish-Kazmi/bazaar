<?php

namespace App\Http\Controllers\Auth\Admins;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:user-list', ['only' => ['index']]);
        $this->middleware('can:user-create', ['only' => ['create', 'store']]);
        $this->middleware('can:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:user-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request) {
        $skip = $request->input('skip', 0); // Default to 25 if not provided
        $take = $request->input('take', 25); // Default to 25 if not provided
        $admins = User::orderBy('id', 'DESC');
        if ($request->search != null && $request->search != '') {
            $search = strtolower($request->search);
            $admins = $admins->where(function ($query) use ($search) {
                $query->where('id', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhereHas('roles', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }
        $total = $admins->count();
        if ($take != 'All') {
            $admins = $admins->skip($skip)->take($take);
        }
        $admins = $admins->get();
        $roles = Role::all();
        if ($request->has('take')) {
            $filterTable = $this->filterTableData($admins->toArray());
            return response()->json([
                'status' => true,
                'tableRows' => $filterTable,
                'total' => $total,
                'record' => (string) $take,
            ]);
        } else {
            $getTagListPermissions = $this->TagListPermissions();
            return Inertia::render('Admins/admins',[
                    'admins' => $admins,
                    'roles' => $roles,
                    'can' => [
                        'create' => Auth::user()->can('user-create'),
                        'edit' => Auth::user()->can('user-edit'),
                        'delete' => Auth::user()->can('user-delete'),
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
                'brand' => Auth::user()->can('brand-list')
            ];
       return $TagListPermissions;
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'phone' => 'required',
            'message' => '',
            'roles' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make('12345678'),
            'message' => $request->message,
        ]);
        $user->assignRole($request->roles);
        return redirect(route('users'));
    }
    public function update(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required',
            'message' => '',
            'roles' => 'required',
        ]);
        $user = User::findOrFail($request->id); // Find the user by ID
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        $user->syncRoles($request->roles);
        return redirect(route('users'));
    }
    public function destory(Request $request) {
        $user = User::find($request->id);
        $user->delete();
        return redirect(route('users'));
    }
    public function filterTableData($admins)
    {
        // Create a new array with only the desired keys/values
        $filteredProducts = array_map(function ($admins) {
            return [
                'id' => $admins['id'] ?? '',
                'name' => $admins['name'] ?? '',
                'phone' => $admins['phone'] ?? '',
                'role_name' => $admins['role_name'] ?? '',
            ];
        }, $admins);
        return $filteredProducts;
    }
}
