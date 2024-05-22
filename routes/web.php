<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\Admins\AdminController;
use App\Http\Controllers\Auth\Admins\PermissionController;
use App\Http\Controllers\Auth\Admins\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomepageController::class, 'index'])->name('home');   

Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Users
    Route::get('/users',[AdminController::class,'index'])->name('users');
    Route::post('/user/store',[AdminController::class,'store'])->name('profile.store');
    Route::patch('/user/update',[AdminController::class,'update'])->name('profile.update.user');
    Route::post('/user/delete',[AdminController::class,'destory'])->name('profile.destory');
    // Roles
    Route::get('/roles',[RoleController::class,'index'])->name('roles');
    Route::post('/role/store',[RoleController::class,'store'])->name('roles.store');
    Route::patch('/role/update',[RoleController::class,'update'])->name('roles.update');
    Route::post('/role/delete',[RoleController::class,'destroy'])->name('roles.destory');
    // Permissions
    Route::get('/permissions',[PermissionController::class,'index'])->name('permissions');
    Route::post('/permission/store',[PermissionController::class,'store'])->name('permissions.store');
});

require __DIR__.'/auth.php';
