<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Show order form
    public function create(Product $product)
    {
        return view('customer.orders.create', compact('product'));
    }

    // Store order
    public function store(Request $request, Product $product)
    {
        // Check if the customer is authenticated
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customer.login')->withErrors(['login' => 'You must be logged in to place an order.']);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->quantity, // Adjusting for product quantity available
        ]);

        $order = Order::create([
            'customer_id' => Auth::guard('customer')->id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total_price' => $product->price * $request->quantity,
            'order_date' => now(), // Add this line to set the order date
        ]);

        return redirect()->route('customer.orders')->with('success', 'Order placed successfully!');
    }

    // Show the authenticated customer's orders
    public function index()
    {
        // Retrieve orders for the authenticated customer
        $customer = Auth::guard('customer')->user();
        $orders = Order::where('customer_id', $customer->id)->get(); // Assuming the order table has a 'customer_id' column

        return view('customer.orders.index', compact('orders', 'customer')); // Adjust the view path as needed
    }
}
