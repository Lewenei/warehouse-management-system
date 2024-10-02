@extends('layouts.admin-layout')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Supplier</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
                <li class="breadcrumb-item active">Edit Supplier</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Supplier</h5>

                        <form method="POST" action="{{ route('suppliers.update', $supplier) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $supplier->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $supplier->email) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Supplier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
