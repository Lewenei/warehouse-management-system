@extends('layouts.user-layout') <!-- Extending the user layout -->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Products List</h1>
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

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Products Data</h5>
                        <p>
                            Manage your products effectively using the table below.
                        </p>
                        <a href="{{ route('user.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
                        <!-- Success Message -->
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <!-- Check if there are products -->
                        @if($products->isEmpty())
                        <div class="alert alert-warning">
                            No products found. Please add a product using the button above.
                        </div>
                        @else
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Product Type</th>
                                    <th>Warehouse Location</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->productType->name }}</td>
                                    <td>{{ $product->warehouseLocation->location_name }}</td>
                                    <td>
                                        
                                    <a href="{{ route('user.products.edit', $product) }}" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                                    <!-- View Product Button -->
                                    <a href="{{ route('user.products.show', $product->id) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('user.sales.create', $product->id) }}" class="btn btn-primary"><i class="bi bi-cart-check"></i></a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div><!-- End Card -->

            </div>
        </div>
    </section>
</main>