@extends('layouts.admin-layout')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Reports</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Reports</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Export Reports</h5>

                        <div class="d-grid gap-2 d-md-block">
                            <a href="{{ route('reports.users') }}" class="btn btn-success mb-2">Export Users</a>
                            <a href="{{ route('reports.products') }}" class="btn btn-success mb-2">Export Products</a>
                            <a href="{{ route('reports.suppliers') }}" class="btn btn-success mb-2">Export Suppliers</a>
                            <a href="{{ route('reports.sales') }}" class="btn btn-success mb-2">Export Sales</a>
                        </div>

                    </div>
                </div><!-- End Card -->

            </div>
        </div>
    </section>

</main><!-- End #main -->
