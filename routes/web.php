<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseLocationController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard Route (authenticated users)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/products', [ProductController::class, 'index'])->name('user.products');
    Route::get('/user/products/create', [ProductController::class, 'create'])->name('user.products.create'); // Allow users to view the create form
    Route::post('/user/products', [ProductController::class, 'store'])->name('user.products.store'); // Allow users to store products
    Route::post('/user/order', [OrderController::class, 'store'])->name('order.store');


    // Suppliers and Locations for users
    Route::get('/user/suppliers', [SupplierController::class, 'index'])->name('user.suppliers'); // Define user suppliers route
    Route::get('/user/warehouse-locations', [WarehouseLocationController::class, 'index'])->name('user.locations'); // Define user locations route

});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'viewUsers'])->name('admin.viewUsers'); // New route for viewing users
    Route::resource('/locations', WarehouseLocationController::class);
    Route::post('/admin/users/{id}/approve', [AdminController::class, 'approveUser'])->name('admin.approveUser');
    Route::post('/admin/users/{id}/disapprove', [AdminController::class, 'disapproveUser'])->name('admin.disapproveUser');

    Route::resource('/products', ProductController::class);
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::put('admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    // View a specific product
    Route::get('/admin/products/{product}', [ProductController::class, 'show'])->name('admin.products.show');



    Route::resource('/product-types', ProductTypeController::class)->except(['show']);
    Route::resource('warehouse-locations', WarehouseLocationController::class);

    Route::resource('suppliers', SupplierController::class);
});

// Profile Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
require __DIR__ . '/auth.php';
