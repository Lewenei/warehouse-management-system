@extends('layouts.customer-layout')

@section('content')
<main>
    <div class="container">
        <h1>Order {{ $product->name }}</h1>

        <form action="{{ route('customer.order.store', $product) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="quantity" required min="1" max="{{ $product->quantity }}">
                @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
</main>
@endsection
