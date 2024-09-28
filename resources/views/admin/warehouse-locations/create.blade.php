@extends('layouts.admin-layout')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Warehouse Location Registration</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Warehouse Locations</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Register New Warehouse Location</h5>

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

                            <!-- Warehouse Location Creation Form -->
                            <form action="{{ route('warehouse-locations.store') }}" method="POST">
                                @csrf

                                <div class="row mb-3">
                                    <label for="location_name" class="col-sm-2 col-form-label">Location Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="location_name" id="location_name" class="form-control" value="{{ old('location_name') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10 offset-sm-2">
                                        <button type="submit" class="btn btn-primary">Add Location</button>
                                    </div>
                                </div>

                            </form><!-- End Warehouse Location Creation Form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
