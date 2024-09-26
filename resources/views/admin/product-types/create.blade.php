@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Product Type</h1>

    <form action="{{ route('product-types.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Type Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Product Type</button>
    </form>
</div>
@endsection
