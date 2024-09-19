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
}
