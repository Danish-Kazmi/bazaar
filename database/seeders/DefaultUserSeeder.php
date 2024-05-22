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
            'name' => 'Ahsan Iftikhar',
            'email' => 'ai.ahsan.iftikhar@admin.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('super-admin');
    }
}
