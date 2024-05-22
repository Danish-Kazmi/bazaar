<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function dashboard() {
        $getTagListPermissions = $this->TagListPermissions();
        $roles = Role::count();
        $users = User::count();
        $permissions = Permission::count();
        return Inertia::render('Dashboard',[
            'roles' => $roles,
            'users' => $users,
            'permissions' => $permissions,
            'can' => [
                'list' => $getTagListPermissions,
            ]
        ]);
    }
    public function TagListPermissions() {
        $TagListPermissions = [
                'users' => Auth::user()->can('user-list'),
                'roles' => Auth::user()->can('role-list'),
                'permissions' => Auth::user()->can('permission-list')
             ];
        return $TagListPermissions;
     }
}

