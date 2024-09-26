@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product Types</h1>

    <a href="{{ route('product-types.create') }}" class="btn btn-primary">Add Product Type</a>

    @if ($productTypes->isEmpty())
        <p>No product types available.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productTypes as $productType)
                    <tr>
                        <td>{{ $productType->name }}</td>
                        <td>
                            <a href="{{ route('product-types.edit', $productType) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('product-types.destroy', $productType) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
