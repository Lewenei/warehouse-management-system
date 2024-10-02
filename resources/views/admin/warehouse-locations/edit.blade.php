@extends('layouts.admin-layout')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Warehouse Location</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('warehouse-locations.index') }}">Warehouse Locations</a></li>
                <li class="breadcrumb-item active">Edit Warehouse Location</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Warehouse Location</h5>

                        <form method="POST" action="{{ route('warehouse-locations.update', $location) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="location_name" class="form-label">Location Name</label>
                                <input type="text" name="location_name" class="form-control" id="location_name" value="{{ old('location_name', $location->location_name) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Warehouse Location</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
