<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\WarehouseLocation;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Display a listing of products
    public function index()
    {
        $products = Product::with('productType', 'warehouseLocation')->get();

        // Return different views based on the user role
        if (Auth::user()->role == 'admin') {
            return view('admin.products.index', compact('products'));
        } else {
            return view('user.products.index', compact('products')); // Change this to user view
        }
    }

    // Show the form for creating a new product
    public function create()
    {
        $productTypes = ProductType::all();
        $locations = WarehouseLocation::all();
        $suppliers = Supplier::all();

        // Check if the user is an admin or a regular user and serve the correct view
        if (Auth::user()->role == 'admin') {
            return view('admin.products.create', compact('productTypes', 'locations', 'suppliers'));
        } else {
            return view('user.products.create', compact('productTypes', 'locations', 'suppliers')); // Users see their own view
        }
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
            'supplier_id' => 'required|exists:suppliers,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate the image
        ]);

        // Handle the image upload using the `Storage` facade
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/products', 'public'); // Save image to storage
        } else {
            $imagePath = null; // No image uploaded
        }

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
            'supplier_id' => $request->supplier_id,
            'image' => $imagePath, // Save the image name or null
        ]);

        // Redirect based on role
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
        } else {
            return redirect()->route('user.products.index')->with('success', 'Product added successfully!');
        }
    }

    // Show the form for editing the specified product
    public function edit(Product $product)
    {
        $productTypes = ProductType::all();
        $locations = WarehouseLocation::all();
        $suppliers = Supplier::all(); // Fetch the suppliers

        // Return different views based on the user role
        if (Auth::user()->role == 'admin') {
            return view('admin.products.edit', compact('product', 'productTypes', 'locations', 'suppliers'));
        } else {
            return view('user.products.edit', compact('product', 'productTypes', 'locations', 'suppliers'));
        }
    }

    // Update the specified product in storage
    public function update(Request $request, Product $product)
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
            'supplier_id' => 'required|exists:suppliers,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image
        ]);

        $product->update($request->only([
            'name',
            'description',
            'quantity',
            'price',
            'batch_number',
            'expiry_date',
            'product_type_id',
            'warehouse_location_id',
            'supplier_id'
        ]));


        // Handle image upload if a new image is present
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                Storage::disk('public')->delete('images/products/' . $product->image);
            }
            // Store the new image
            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image = $imagePath; // Update the image path
        }

        // Save the product
        $product->save();

        // Redirect based on role
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
        } else {
            return redirect()->route('user.products')->with('success', 'Product updated successfully!');
        }
    }

    // Remove the specified product from storage
    public function destroy(Product $product)
    {
        // Optionally, delete the image file from storage if it exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        // Redirect based on role
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
        } else {
            return redirect()->route('user.products')->with('success', 'Product deleted successfully!');
        }
    }


    // Show the specified product
    public function show(Product $product)
    {
        // Return the view for displaying product details
        if (Auth::user()->role == 'admin') {
            return view('admin.products.show', compact('product'));
        } else {
            return view('user.products.show', compact('product')); // Adjust for user role if needed
        }
    }
}
