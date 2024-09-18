<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Store a newly created outgoing order in storage
    public function store(Request $request)
    {
        $request->validate([
            'order_date' => 'required|date',
            'product_id' => 'required|exists:products,id',
            'quantity_shipped' => 'required|integer|min:1',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:15',
        ]);

        $product = Product::find($request->product_id);

        // Check if there is enough stock
        if ($product->quantity < $request->quantity_shipped) {
            return redirect()->back()->withErrors('Not enough stock available');
        }

        // Reduce product quantity
        $product->quantity -= $request->quantity_shipped;
        $product->save();

        // Create the order
        Order::create($request->all());

        return redirect()->back()->with('success', 'Order placed successfully!');
    }

    // Display a listing of incoming and outgoing orders (if needed)
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }
}