<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'visitor']);
        Role::create(['name' => 'buyer']);
        // $seller_roles = Role::create(['name' => 'seller']);
        // $seller_permission = Permission::where(function ($query) {
        //     $query->where('name', 'like', '%product%');
        // })->pluck('id')->toArray();
        // $seller_roles->permissions()->sync($seller_permission);
        
        $permissions = Permission::all();
        $roles = Role::create(['name' => 'super-admin']);
        foreach ($permissions as $permission) {
            $roles->givePermissionTo($permission);
        }
    }
}
