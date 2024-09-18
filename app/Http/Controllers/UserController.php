<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display a user dashboard or home page
    public function index()
    {
        return view('user.index');
    }

    // Display a listing of products for users
    public function viewProducts()
    {
        $products = Product::all();
        return view('user.view_products', compact('products'));
    }
}