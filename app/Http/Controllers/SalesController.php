<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{

    public function index()
    {
        // Get the logged-in user's sales
        $sales = Sale::where('user_id', auth()->id())->with('product')->get();

        return view('user.sales.index', compact('sales'));
    }



    public function create(Product $product)
    {
        return view('user.sales.create', compact('product'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string',
        ]);

        // Find the product
        $product = Product::find($request->product_id);

        // Check if enough stock is available
        if ($request->quantity > $product->quantity) {
            return redirect()->back()->withErrors(['quantity' => 'Not enough stock available']);
        }

        // Create a new sale
        Sale::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
        ]);

        // Update product stock
        $product->decrement('quantity', $request->quantity);

        return redirect()->route('user.products')->with('success', 'Product sold successfully!');
    }

    public function adminIndex()
    {
        // Fetch all sales with user and product information
        $sales = Sale::with(['user', 'product'])->get();

        return view('admin.sales.index', compact('sales'));
    }
}
