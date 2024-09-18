<?php

namespace App\Http\Controllers;

use App\Models\WarehouseLocation;
use Illuminate\Http\Request;

class WarehouseLocationController extends Controller
{
    // Display a listing of warehouse locations
    public function index()
    {
        $locations = WarehouseLocation::all();
        return view('locations.index', compact('locations'));
    }

    // Show the form for creating a new warehouse location
    public function create()
    {
        return view('locations.create');
    }

    // Store a newly created warehouse location in storage
    public function store(Request $request)
    {
        $request->validate([
            'location_name' => 'required|string|max:255',
        ]);

        WarehouseLocation::create($request->all());

        return redirect()->route('locations.index')->with('success', 'Warehouse location added successfully!');
    }

    // Show the form for editing the specified warehouse location
    public function edit(WarehouseLocation $location)
    {
        return view('locations.edit', compact('location'));
    }

    // Update the specified warehouse location in storage
    public function update(Request $request, WarehouseLocation $location)
    {
        $request->validate([
            'location_name' => 'required|string|max:255',
        ]);

        $location->update($request->all());

        return redirect()->route('locations.index')->with('success', 'Warehouse location updated successfully!');
    }

    // Remove the specified warehouse location from storage
    public function destroy(WarehouseLocation $location)
    {
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Warehouse location deleted successfully!');
    }
}