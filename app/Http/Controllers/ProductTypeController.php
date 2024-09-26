<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    // Display a listing of product types
    public function index()
    {
        $productTypes = ProductType::all();
        return view('admin.product-types.index', compact('productTypes'));
    }

    // Show the form for creating a new product type
    public function create()
    {
        return view('admin.product-types.create');
    }

    // Store a newly created product type
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ProductType::create([
            'name' => $request->name,
        ]);

        return redirect()->route('product-types.index')->with('success', 'Product Type created successfully!');
    }

    // Show the form for editing a product type
    public function edit(ProductType $productType)
    {
        return view('admin.product-types.edit', compact('productType'));
    }

    // Update the product type
    public function update(Request $request, ProductType $productType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $productType->update([
            'name' => $request->name,
        ]);

        return redirect()->route('product-types.index')->with('success', 'Product Type updated successfully!');
    }

    // Delete a product type
    public function destroy(ProductType $productType)
    {
        $productType->delete();

        return redirect()->route('product-types.index')->with('success', 'Product Type deleted successfully!');
    }
}
