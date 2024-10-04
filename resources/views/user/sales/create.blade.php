@extends('layouts.user-layout')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Outgoing Goods</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Outgoing Goods</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sell Product</h5>

                        <!-- Outgoing Goods Form -->
                        <form method="POST" action="{{ route('user.sales.store') }}">
                            @csrf

                            <!-- Product -->
                            <div class="row mb-3">
                                <label for="product" class="col-sm-2 col-form-label">Product</label>
                                <div class="col-sm-10">
                                    <select name="product_id" class="form-control" id="product" required>
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Quantity -->
                            <div class="row mb-3">
                                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" name="quantity" class="form-control" id="quantity" required>
                                </div>
                            </div>

                            <!-- Customer Name -->
                            <div class="row mb-3">
                                <label for="customer_name" class="col-sm-2 col-form-label">Customer Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="customer_name" class="form-control" id="customer_name" required>
                                </div>
                            </div>

                            <!-- Customer Email -->
                            <div class="row mb-3">
                                <label for="customer_email" class="col-sm-2 col-form-label">Customer Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="customer_email" class="form-control" id="customer_email" required>
                                </div>
                            </div>

                            <!-- Customer Phone -->
                            <div class="row mb-3">
                                <label for="customer_phone" class="col-sm-2 col-form-label">Customer Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="customer_phone" class="form-control" id="customer_phone" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Sell Product</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
