<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Visitor User',
            'email' => 'visitor@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('visitor');

        User::create([
            'name' => 'Customer Buyer',
            'email' => 'buyer@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('buyer');

        User::create([
            'name' => 'Bazaar Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('super-admin');
    }
}
