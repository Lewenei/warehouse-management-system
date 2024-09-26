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
        return view('admin.warehouse-locations.index', compact('locations'));
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

    // Show the form for editing a warehouse location
    public function edit(WarehouseLocation $warehouseLocation)
    {
        return view('admin.warehouse-locations.edit', compact('warehouseLocation'));
    }

    // Update the warehouse location
    public function update(Request $request, WarehouseLocation $warehouseLocation)
    {
        $request->validate([
            'location_name' => 'required|string|max:255',
        ]);

        $warehouseLocation->update([
            'location_name' => $request->location_name,
        ]);

        return redirect()->route('warehouse-locations.index')->with('success', 'Warehouse Location updated successfully!');
    }

    // Delete a warehouse location
    public function destroy(WarehouseLocation $warehouseLocation)
    {
        $warehouseLocation->delete();

        return redirect()->route('warehouse-locations.index')->with('success', 'Warehouse Location deleted successfully!');
    }
}
