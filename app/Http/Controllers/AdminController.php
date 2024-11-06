<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;

class AdminController extends Controller
{
    public function registerUser(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encrypt password
            'role' => 'user', // Default role is 'user'
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'User registered successfully!');
    }

    // Method for displaying the admin dashboard
    public function index()
    {
        // Admin dashboard page (admin.index)

        // Fetch the total count of products and users
        $totalProducts = Product::count();
        $totalUsers = User::count();


        return view('admin.index', compact('totalProducts', 'totalUsers'));
    }
    public function registerForm()
    {
        return view('admin.register');
    }

    public function viewUsers()
    {
        // Retrieve all users, you can modify this query to paginate or filter based on your needs
        $users = User::all();

        return view('admin.users', compact('users')); // Pass the users data to the view
    }

    /**
     * Approve a user.
     */
    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->approved = true;  // Approve the user
        $user->save();

        return redirect()->route('admin.viewUsers')->with('success', 'User approved successfully!');
    }

    /**
     * Disapprove a user.
     */
    public function disapproveUser($id)
    {
        $user = User::findOrFail($id);
        $user->approved = false; // Disapprove the user
        $user->save();

        return redirect()->route('admin.viewUsers')->with('success', 'User disapproved successfully!');
    }

    public function showReports()
    {
        return view('admin.reports'); // Assuming your view is located at resources/views/admin/reports.blade.php
    }
    //Admin Orders
    public function viewOrders()
    {
        // Retrieve all orders, you could also paginate the results if needed
        $orders = Order::with(['customer', 'product'])->get(); // Eager load related data

        return view('admin.orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        // Find the order
        $order = Order::findOrFail($id);

        // Check the current status and the new status
        if ($order->status !== 'completed' && $request->status === 'completed') {
            // Reduce the product count if the order is being marked as completed
            $product = $order->product; // Assuming you have a relationship defined

            if ($product) {
                $product->quantity -= $order->quantity; // Reduce stock by the ordered quantity
                $product->save(); // Save the updated product
            }
        }

        // Update the order status
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.viewOrders')->with('success', 'Order status updated successfully!');
    }
}
