<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\WarehouseLocation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display a listing of products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show the form for creating a new product
    public function create()
    {
        $productTypes = ProductType::all();
        $locations = WarehouseLocation::all();
        return view('products.create', compact('productTypes', 'locations'));
    }

    // Store a newly created product in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
            'product_type_id' => 'required|exists:product_types,id',
            'warehouse_location_id' => 'required|exists:warehouse_locations,id',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    // Show the form for editing the specified product
    public function edit(Product $product)
    {
        $productTypes = ProductType::all();
        $locations = WarehouseLocation::all();
        return view('products.edit', compact('product', 'productTypes', 'locations'));
    }

    // Update the specified product in storage
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
            'product_type_id' => 'required|exists:product_types,id',
            'warehouse_location_id' => 'required|exists:warehouse_locations,id',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Remove the specified product from storage
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}