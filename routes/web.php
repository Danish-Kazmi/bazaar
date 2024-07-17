<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\Admins\AdminController;
use App\Http\Controllers\Auth\Admins\PermissionController;
use App\Http\Controllers\Auth\Admins\RoleController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
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


Route::middleware(['category'])->group(function () {
    Route::get('/', [HomepageController::class, 'index'])->name('home');

    Route::get('/checkout', [checkoutController::class, 'checkout'])->name('checkout');
    Route::get('/cart', [checkoutController::class, 'view_cart'])->name('view_cart');
    Route::get('/pros', [HomepageController::class, 'pros'])->name('pros');
    Route::get('/products', [HomepageController::class, 'products'])->name('products');
    Route::get('/api/products', [HomepageController::class, 'getProducts'])->name('getProducts');
    Route::get('/product/{product_id}', [HomepageController::class, 'singleProduct'])->name('single_product');
    Route::get('/contact-us', [HomepageController::class, 'contact_us'])->name('contact_us');
    Route::post('/contact-us', [HomepageController::class, 'contact_email'])->name('contact_us');
    Route::get('/about-us', [HomepageController::class, 'aboutUs'])->name('about_us');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Users
    Route::get('/users', [AdminController::class, 'index'])->name('users');
    Route::post('/user/store', [AdminController::class, 'store'])->name('profile.store');
    Route::patch('/user/update', [AdminController::class, 'update'])->name('profile.update.user');
    Route::post('/user/delete', [AdminController::class, 'destory'])->name('profile.destory');
    // Roles
    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::post('/role/store', [RoleController::class, 'store'])->name('roles.store');
    Route::patch('/role/update', [RoleController::class, 'update'])->name('roles.update');
    Route::post('/role/delete', [RoleController::class, 'destroy'])->name('roles.destory');
    // Permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permissions.store');

    // Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destory'])->name('category.destory');

    // Brand
    Route::get('/brands', [BrandController::class, 'index'])->middleware('category')->name('brand.index');
    Route::post('/brands', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brands/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/brands/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    Route::get('/get_brands_by_category/{cate}', [BrandController::class, 'get_brands_by_category'])->name('brand.category');

    // Product
    Route::get('/product', [ProductController::class, 'index'])->middleware('category')->name('product.index');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});

require __DIR__ . '/auth.php';
