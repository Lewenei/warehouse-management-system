@extends('layouts.user-layout') <!-- Extending the user layout -->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Warehouse Locations List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Suppliers</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Warehouse Locations Data</h5>
                        <p>
                            Manage your warehouse locations effectively using the table below.
                        </p>

                        <!-- Check if there are products -->
                        @if($locations->isEmpty())
                        <div class="alert alert-warning">
                            No Warehouse Locations found. Please allow time for admin to register them.
                        </div>
                        @else
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Location Name</th>
                                    <th>Actions</th> <!-- New Actions Column -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($locations as $location)
                                <tr>
                                    <td>{{ $location->location_name }}</td>
                                    <td>
                                        <a href="{{ route('user.products.byWarehouse', $location->id) }}" class="btn btn-sm btn-info">View Products</a>
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