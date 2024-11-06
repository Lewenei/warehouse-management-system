@extends('layouts.customer-layout')

@section('content')
<div class="container">
    <h1>Welcome to Your Dashboard</h1>
    <h2>Available Products</h2>

    <!-- Search Form -->
    <form action="{{ route('customer.dashboard') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search for products..." value="{{ request('search') }}">
            <select name="type" class="form-select">
                <option value="">All Types</option>
                @foreach ($productTypes as $type)
                    <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4">
            <div class="card mb-4">
                <!-- Display Product Image -->
                @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                @else
                <img src="{{ asset('assets/img/default-product.jpg') }}" class="card-img-top" alt="Default Product Image" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">Price: KSH {{ $product->price }}</p>
                    <p class="card-text">Available Quantity: {{ $product->quantity }}</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                    <a href="{{ route('customer.order.create', $product->id) }}" class="btn btn-success">Order Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
  
</div>
@endsection
