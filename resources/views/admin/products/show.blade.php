@extends('layouts.admin-layout')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Product Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="breadcrumb-item active">Product Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <!-- Card with an image on left -->
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-start" alt="{{ $product->name }}">
                            @else
                                <img src="path/to/default/image.jpg" class="img-fluid rounded-start" alt="Default Image">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
                                <p class="card-text"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                                <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                                <p class="card-text"><strong>Batch Number:</strong> {{ $product->batch_number }}</p>
                                <p class="card-text"><strong>Expiry Date:</strong> {{ $product->expiry_date }}</p>
                                <p class="card-text"><strong>Product Type:</strong> {{ $product->productType->name }}</p>
                                <p class="card-text"><strong>Warehouse Location:</strong> {{ $product->warehouseLocation->location_name }}</p>
                                <p class="card-text"><strong>Supplier:</strong> {{ $product->supplier->name }}</p>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card with an image on left -->

            </div>
        </div>
    </section>

</main><!-- End #main -->
