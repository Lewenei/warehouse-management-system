@extends('layouts.user-layout') <!-- Extending the user layout -->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.products') }}">Products</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Product</h5>

                        <!-- Form for editing product -->
                        <form method="POST" action="{{ route('user.products.update', $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $product->name) }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" id="description">{{ old('description', $product->description) }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" name="quantity" class="form-control" id="quantity" value="{{ old('quantity', $product->quantity) }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" name="price" class="form-control" id="price" value="{{ old('price', $product->price) }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="product_type_id" class="col-sm-2 col-form-label">Product Type</label>
                                <div class="col-sm-10">
                                    <select name="product_type_id" class="form-control" id="product_type_id" required>
                                        @foreach($productTypes as $type)
                                        <option value="{{ $type->id }}" {{ $product->product_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="supplier_id" class="col-sm-2 col-form-label">Supplier</label>
                                <div class="col-sm-10">
                                    <select name="supplier_id" class="form-control" id="supplier_id" required>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="warehouse_location_id" class="col-sm-2 col-form-label">Warehouse Location</label>
                                <div class="col-sm-10">
                                    <select name="warehouse_location_id" class="form-control" id="warehouse_location_id" required>
                                        @foreach($locations as $location)
                                        <option value="{{ $location->id }}" {{ $product->warehouse_location_id == $location->id ? 'selected' : '' }}>
                                            {{ $location->location_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="formFile" class="col-sm-2 col-form-label">File Upload</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="image">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>
                    </div>
                </div><!-- End Card -->

            </div>
        </div>
    </section>

</main><!-- End #main -->
