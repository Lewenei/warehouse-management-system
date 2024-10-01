@extends('layouts.user-layout') <!-- Extending the user layout -->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Suppliers List</h1>
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
                        <h5 class="card-title">Supplier Data</h5>
                        <p>
                            Manage your suppliers effectively using the table below.
                        </p>

                        <!-- Check if there are products -->
                        @if($suppliers->isEmpty())
                        <div class="alert alert-warning">
                            No Suppliers found. Please allow time for admin to register them.
                        </div>
                        @else
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->email }}</td>
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