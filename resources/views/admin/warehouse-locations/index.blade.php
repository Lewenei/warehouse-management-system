@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Warehouse Locations</h1>

    <a href="{{ route('warehouse-locations.create') }}" class="btn btn-primary">Add Warehouse Location</a>

    @if ($locations->isEmpty())
        <p>No warehouse locations available.</p>
    @else
        <table class="table">
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
@endsection
