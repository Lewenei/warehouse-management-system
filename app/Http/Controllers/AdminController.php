<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function registerUser (Request $request)
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
        return view('admin.index');
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
}
