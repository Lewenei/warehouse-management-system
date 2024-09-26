@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Warehouse Location</h1>

    <form action="{{ route('warehouse-locations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="location_name" class="form-label">Location Name</label>
            <input type="text" name="location_name" id="location_name" class="form-control" value="{{ old('location_name') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Location</button>
    </form>
</div>
@endsection
