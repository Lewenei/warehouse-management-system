@extends('layouts.admin-layout')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Sales Records</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Sales</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Sales</h5>

                        <!-- Check if there are sales -->
                        @if ($sales->isEmpty())
                            <div class="alert alert-warning">
                                No sales found.
                            </div>
                        @else
                            <!-- Table with sales records -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity Sold</th>
                                        <th>Sold By (User)</th>
                                        <th>Customer Name</th>
                                        <th>Customer Email</th>
                                        <th>Customer Phone</th>
                                        <th>Date Sold</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td>{{ $sale->product->name }}</td>
                                            <td>{{ $sale->quantity }}</td>
                                            <td>{{ $sale->user->name }}</td> <!-- User who sold the product -->
                                            <td>{{ $sale->customer_name }}</td>
                                            <td>{{ $sale->customer_email }}</td>
                                            <td>{{ $sale->customer_phone }}</td>
                                            <td>{{ $sale->created_at->format('d-m-Y H:i') }}</td>
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
