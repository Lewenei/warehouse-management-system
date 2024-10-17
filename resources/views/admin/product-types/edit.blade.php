@extends('layouts.admin-layout')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Product Type</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product-types.index') }}">Product Types</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Product Type</h5>

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

                            <!-- Product Type Edit Form -->
                            <form action="{{ route('product-types.update', $productType->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-4 col-form-label">Product Type Name</label>
                                    <div class="col-sm-8">
                                        <input 
                                            type="text" 
                                            name="name" 
                                            id="name" 
                                            class="form-control" 
                                            value="{{ old('name', $productType->name) }}" 
                                            required
                                        >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-8 offset-sm-4">
                                        <button type="submit" class="btn btn-primary">Update Product Type</button>
                                    </div>
                                </div>
                            </form><!-- End Product Type Edit Form -->

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
