@extends('layouts.user-layout')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Products Registration</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Product</h5>

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
                            <form action="{{ route('user.products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="description" class="form-control" style="height: 100px">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="price" id="price" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="batch_number" class="col-sm-2 col-form-label">Batch Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="batch_number" id="batch_number">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="expiry_date" class="col-sm-2 col-form-label">Expiry Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="expiry_date" id="expiry_date">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="product_type_id" class="col-sm-2 col-form-label">Product Type</label>
                                    <div class="col-sm-10">
                                        <select name="product_type_id" id="product_type_id" class="form-select" required>
                                            @foreach ($productTypes as $productType)
                                            <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="warehouse_location_id" class="col-sm-2 col-form-label">Warehouse Location</label>
                                    <div class="col-sm-10">
                                        <select name="warehouse_location_id" id="warehouse_location_id" class="form-select" required>
                                            @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="supplier_id" class="col-sm-2 col-form-label">Supplier</label>
                                    <div class="col-sm-10">
                                        <select name="supplier_id" id="supplier_id" class="form-select" required>
                                            <option value="">Select a supplier</option>
                                            @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Image Upload Section -->
                                <div class="row mb-3">
                                    <label for="formFile" class="col-sm-2 col-form-label">File Upload</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="formFile" name="image" accept="image/*"> <!-- Accept image files only -->
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10 offset-sm-2">
                                        <button type="submit" class="btn btn-primary">Add Product</button>
                                    </div>
                                </div>

                            </form><!-- End Product Creation Form -->

                        </div>
                    </div>
                </div>
    </section>
</main>