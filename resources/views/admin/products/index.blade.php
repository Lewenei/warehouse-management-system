@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products List</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Product Button -->
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>

    <!-- Check if there are products -->
    @if($products->isEmpty())
        <div class="alert alert-warning">
            No products found. Please add a product using the button above.
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Product Type</th>
                    <th>Warehouse Location</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->productType->name }}</td>
                        <td>{{ $product->warehouseLocation->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
