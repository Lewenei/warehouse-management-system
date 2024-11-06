<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;

class CustomerDashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Search functionality
        if ($request->has('search') && $request->search !== '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Sorting functionality by type
        if ($request->has('type') && $request->type !== '') {
            $query->where('product_type_id', $request->type); // Match product_type_id
        }

        $products = $query->get(); // Fetch the products based on the above filters
        $productTypes = ProductType::all(); // Get all product types

        return view('customer.dashboard', compact('products', 'productTypes')); // Pass product types to the view
    }
}
