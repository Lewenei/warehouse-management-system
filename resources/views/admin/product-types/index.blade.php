@extends('layouts.admin-layout')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Product Types</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Product Types</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Product Types Data</h5>
                        <p>
                            Manage your product types effectively using the table below.
                        </p>
                        <a href="{{ route('product-types.create') }}" class="btn btn-primary mb-3">Add Product Type</a>

                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Check if there are product types -->
                        @if($productTypes->isEmpty())
                            <div class="alert alert-warning">
                                No product types found. Please add a product type using the button above.
                            </div>
                        @else
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productTypes as $productType)
                                        <tr>
                                            <td>{{ $productType->name }}</td>
                                            <td>
                                                <a href="{{ route('product-types.edit', $productType) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('product-types.destroy', $productType) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
