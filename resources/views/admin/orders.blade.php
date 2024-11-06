<!-- resources/views/admin/orders.blade.php -->

@extends('layouts.admin-layout') <!-- Assuming you have an admin layout -->

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Customer Orders</h1>
    </div>

    <section class="section">
    <div class="container mt-4">

        @if($orders->isEmpty())
        <p>No orders available.</p>
        @else
        <table class="table datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name ?? 'N/A' }}</td> <!-- Display customer name -->
                    <td>{{ $order->product->name ?? 'N/A' }}</td> <!-- Display product name -->
                    <td>{{ $order->quantity }}</td>
                    <td>KSH{{ number_format($order->total_price, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>
                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                        @csrf
                        <select name="status" required>
                            <option value="">Select Status</option>
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    </section>