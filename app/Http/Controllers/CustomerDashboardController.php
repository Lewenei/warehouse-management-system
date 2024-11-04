<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Adjust to filter products based on your needs
        return view('customer.dashboard', compact('products'));
    }
}
