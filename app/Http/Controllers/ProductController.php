<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\WarehouseLocation;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Display a listing of products
    public function index()
    {
        $products = Product::with('productType', 'warehouseLocation')->get();

        return view('admin.products.index', compact('products'));
    }

    // Show the form for creating a new product
    public function create()
    {
        $productTypes = ProductType::all();
        $locations = WarehouseLocation::all();
         // Fetch all suppliers
         $suppliers = Supplier::all(); 
        return view('admin.products.create', compact('productTypes', 'locations', 'suppliers'));
    }

    // Store a newly created product in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
            'batch_number' => 'nullable|string',
            'expiry_date' => 'nullable|date',
            'product_type_id' => 'required|exists:product_types,id',
            'warehouse_location_id' => 'required|exists:warehouse_locations,id',
            'supplier_id' => 'required|exists:suppliers,id', // Validate supplier_id
        ]);

        // Create the product and associate it with the logged-in user
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'batch_number' => $request->batch_number,
            'expiry_date' => $request->expiry_date,
            'product_type_id' => $request->product_type_id,
            'warehouse_location_id' => $request->warehouse_location_id,
            'user_id' => Auth::id(), // Add the authenticated user's ID
            'supplier_id' => $request->supplier_id, // Add supplier ID
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
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

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    // Remove the specified product from storage
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}
