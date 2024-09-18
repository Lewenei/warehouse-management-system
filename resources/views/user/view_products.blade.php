@extends('user.index')

@section('content')
    <h2>Available Products</h2>

    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} - {{ $product->price }}</li>
        @endforeach
    </ul>
@endsection
