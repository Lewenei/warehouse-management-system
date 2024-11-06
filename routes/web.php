<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseLocationController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashboardController;

//Export Routes
use App\Exports\UsersExport;
use App\Exports\ProductsExport;
use App\Exports\SuppliersExport;
use App\Exports\SalesExport;
use Maatwebsite\Excel\Facades\Excel;


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
    Route::get('/user/{product}/edit', [ProductController::class, 'edit'])->name('user.products.edit');
    Route::put('/user/{product}', [ProductController::class, 'update'])->name('user.products.update');
    Route::get('/user/products/{product}', [ProductController::class, 'show'])->name('user.products.show');
    Route::post('/user/products', [ProductController::class, 'store'])->name('user.products.store'); // Allow users to store products

    Route::get('user/warehouse-locations/{warehouse}/products', [ProductController::class, 'getProductsByWarehouse'])->name('user.products.byWarehouse');


    // Suppliers and Locations for users
    Route::get('/user/suppliers', [SupplierController::class, 'index'])->name('user.suppliers'); // Define user suppliers route
    Route::get('/user/warehouse-locations', [WarehouseLocationController::class, 'index'])->name('user.locations'); // Define user locations route

    //Sales
    Route::get('user/products/{product}/sell', [SalesController::class, 'create'])->name('user.sales.create');
    Route::post('user/sales', [SalesController::class, 'store'])->name('user.sales.store');

    // User's past sales
    Route::get('user/sales', [SalesController::class, 'index'])->name('user.sales.index');


    Route::get('user/sales/history', [SalesController::class, 'index'])->name('user.sales.history');
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

    Route::get('admin/warehouse/{warehouse}/products', [ProductController::class, 'getProductsByWarehouse'])->name('admin.products.byWarehouse');
    // Order Routes
    Route::get('/admin/orders', [AdminController::class, 'viewOrders'])->name('admin.viewOrders');
    Route::post('/admin/orders/{id}/update-status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.updateStatus');




    Route::resource('/product-types', ProductTypeController::class)->except(['show']);
    Route::resource('warehouse-locations', WarehouseLocationController::class);

    Route::resource('suppliers', SupplierController::class);

    Route::get('admin/sales', [SalesController::class, 'adminIndex'])->name('admin.sales.index');

    // Export Routes for Reports
    Route::get('admin/reports', function () {
        return view('admin.reports');
    })->name('admin.reports');

    Route::get('reports/users', [ReportsController::class, 'exportUsers'])->name('reports.users');
    Route::get('reports/products', [ReportsController::class, 'exportProducts'])->name('reports.products');
    Route::get('reports/suppliers', [ReportsController::class, 'exportSuppliers'])->name('reports.suppliers');
    Route::get('reports/sales', [ReportsController::class, 'exportSales'])->name('reports.sales');
});

// Profile Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Customer Routes
Route::get('/customer/register', [CustomerAuthController::class, 'showRegisterForm'])->name('customer.register');
Route::post('/customer/register', [CustomerAuthController::class, 'register']);
Route::get('/customer/login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer/login', [CustomerAuthController::class, 'login']);
Route::post('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');

Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
// Customer order routes
Route::get('/customer/products', [CustomerDashboardController::class, 'index'])->name('customer.products'); // Show all products
Route::get('/customer/products/{product}/order', [OrderController::class, 'create'])->name('customer.order.create'); // Order form
Route::post('/customer/products/{product}/order', [OrderController::class, 'store'])->name('customer.order.store'); // Handle order submission

// Add this route to your web.php
Route::get('/customer/orders', [OrderController::class, 'index'])->name('customer.orders'); // Ensure only authenticated customers can access this



// Authentication Routes
require __DIR__ . '/auth.php';
