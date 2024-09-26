@extends('layouts.app')

@section('content')
    <h1>Suppliers</h1>
    
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Add Supplier</a>

    @if ($suppliers->isEmpty())
        <p>No suppliers found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>
                            <!-- Add edit/delete options here -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
