@extends('layouts.user-layout') <!-- Extending the user layout -->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>User Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Products Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card products-card">
                            <div class="card-body">
                                <h5 class="card-title">Registered Products</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-box"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalProducts }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Products Card -->

                    <!-- Suppliers Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card suppliers-card">
                            <div class="card-body">
                                <h5 class="card-title">Registered Suppliers</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalSuppliers }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Suppliers Card -->

                    <!-- Locations Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card locations-card">
                            <div class="card-body">
                                <h5 class="card-title">Warehouse Locations</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalLocations }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Locations Card -->

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->
