@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Product</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Product Creation Form -->
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" id="price" required>
        </div>

        <div class="form-group">
            <label for="batch_number">Batch Number</label>
            <input type="text" class="form-control" name="batch_number" id="batch_number">
        </div>

        <div class="form-group">
            <label for="expiry_date">Expiry Date</label>
            <input type="date" class="form-control" name="expiry_date" id="expiry_date">
        </div>

        <div class="mb-3">
            <label for="product_type_id" class="form-label">Product Type</label>
            <select name="product_type_id" id="product_type_id" class="form-control" required>
                @foreach ($productTypes as $productType)
                <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="warehouse_location_id">Warehouse Location</label>
            <select name="warehouse_location_id" id="warehouse_location_id" required>
                @foreach ($locations as $location)
                <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-control" required>
                <option value="">Select a supplier</option>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
@endsection