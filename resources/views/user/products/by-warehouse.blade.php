@extends('layouts.user-layout')

<main id="main" class="main">

    <div class="pagetitle">
    <h1>Products in {{ $warehouse->location_name ?? 'Unknown Warehouse' }}</h1> <!-- Adding fallback -->
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Warehouse Products</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Products in {{ $warehouse->location_name }}</h5>
                        
                        <!-- Check if there are products in the warehouse -->
                        @if ($products->isEmpty())
                            <div class="alert alert-warning">
                                No products available in this warehouse.
                            </div>
                        @else
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>${{ number_format($product->price, 2) }}</td>
                                            <td>
                                                <a href="{{ route('user.products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                                                <a href="{{ route('user.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
