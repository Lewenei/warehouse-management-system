@extends('layouts.customer-layout')

@section('content')
<div class="container">
    <h1>Welcome to Your Dashboard</h1>
    <h2>Available Products</h2>
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
                    <p class="card-text">Price: ${{ $product->price }}</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                    <a href="{{ route('customer.order.create', $product->id) }}" class="btn btn-success">Order Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
  
    </div>
</div>
@endsection
