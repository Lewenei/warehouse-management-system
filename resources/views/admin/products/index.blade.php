@extends('layouts.admin-layout')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Products List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
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
                        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
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
                                    <th>Actions</th> <!-- Add Actions column -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->productType->name }}</td>
                                    <td> {{ $product->warehouseLocation->location_name }}</td>
                                    <td>
                                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                        <!-- Edit Button -->
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning"><i class="bi bi-pen"></i></a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');"><i class="bi bi-trash"></i></button>
                                        </form>
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

</main><!-- End #main -->