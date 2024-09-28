@extends('layouts.admin-layout')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Warehouse Locations</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Warehouse Locations</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Warehouse Locations</h5>
                        <p>
                            Use the table below to manage your warehouse locations effectively.
                        </p>
                        <a href="{{ route('warehouse-locations.create') }}" class="btn btn-primary mb-3">Add Warehouse Location</a>

                        <!-- Check if there are locations -->
                        @if ($locations->isEmpty())
                            <div class="alert alert-warning">
                                No warehouse locations available. Please add a new location using the button above.
                            </div>
                        @else
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Location Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($locations as $location)
                                        <tr>
                                            <td>{{ $location->location_name }}</td>
                                            <td>
                                                <a href="{{ route('warehouse-locations.edit', $location) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('warehouse-locations.destroy', $location) }}" method="POST" style="display:inline-block;">
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
