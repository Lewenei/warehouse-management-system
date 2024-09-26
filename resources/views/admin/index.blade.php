@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-6">
            <h3>Manage Products</h3>
            <a href="{{ route('products.index') }}" class="btn btn-primary">View Products</a>
            <a href="{{ route('products.create') }}" class="btn btn-success">Add Product</a>
        </div>

        <div class="col-md-6">
            <h3>Manage Product Types</h3>
            <a href="{{ route('product-types.index') }}" class="btn btn-primary">View Product Types</a>
            <a href="{{ route('product-types.create') }}" class="btn btn-success">Add Product Type</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <h3>Manage Warehouse Locations</h3>
            <a href="{{ route('warehouse-locations.index') }}" class="btn btn-primary">View Warehouse Locations</a>
            <a href="{{ route('warehouse-locations.create') }}" class="btn btn-success">Add Warehouse Location</a>
        </div>

        <div class="col-md-6">
            <h3>Manage Users</h3>
            <a href="{{ route('admin.viewUsers') }}" class="btn btn-primary">View Users</a>
           
        </div>

        <div class="col-md-6">
            <h3>Manage Suppliers</h3>
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">View Suppliers</a>
           
        </div>
    </div>
</div>
@endsection
