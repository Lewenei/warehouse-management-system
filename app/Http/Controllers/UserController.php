<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\WarehouseLocation;

class UserController extends Controller
{
    // Display a user dashboard or home page
    public function index()
    {
        $totalProducts = Product::count();
        $totalSuppliers = Supplier::count();
        $totalLocations = WarehouseLocation::count();
    
    
        // Pass data to the view
        return view('user.index', compact('totalProducts', 'totalSuppliers', 'totalLocations'));
    }
    // Display a listing of products for users
    public function viewProducts()
    {
        $products = Product::all();
        return view('user.view_products', compact('products'));
    }
}