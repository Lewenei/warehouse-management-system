<?php

namespace App\Http\Controllers;

use App\Models\WarehouseLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseLocationController extends Controller
{
    // Display a listing of warehouse locations
    public function index()
    {
        $locations = WarehouseLocation::all();
        // Return different views based on the user role
        if (Auth::user()->role == 'admin') {
            return view('admin.warehouse-locations.index', compact('locations'));
        } else {
            return view('user.warehouse-locations.index', compact('locations')); // Change this to user view
        }
    }

    // Show the form for creating a new warehouse location
    public function create()
    {
        return view('admin.warehouse-locations.create');
    }

    // Store a newly created warehouse location
    public function store(Request $request)
    {
        $request->validate([
            'location_name' => 'required|string|max:255',
        ]);

        WarehouseLocation::create([
            'location_name' => $request->location_name,
        ]);

        return redirect()->route('warehouse-locations.index')->with('success', 'Warehouse Location created successfully!');
    }

    // Show the form for editing the specified warehouse location
    public function edit(WarehouseLocation $location)
    {
        return view('admin.warehouse-locations.edit', compact('location'));
    }

    // Update the specified warehouse location in storage
    public function update(Request $request, WarehouseLocation $location)
    {
        $request->validate([
            'location_name' => 'required|string|max:255',
        ]);

        $location->update($request->all());

        return redirect()->route('warehouse-locations.index')->with('success', 'Warehouse location updated successfully!');
    }

    // Remove the specified warehouse location from storage
    public function destroy(WarehouseLocation $location)
    {
        $location->delete();

        return redirect()->route('warehouse-locations.index')->with('success', 'Warehouse location deleted successfully!');
    }
}
