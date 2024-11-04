<!-- resources/views/customer/orders/index.blade.php -->

@extends('layouts.customer-layout') <!-- Adjust the layout as necessary -->
<main id="main" class="main">



    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Order List</h5>
                <p>These are the orders you have made.</p>

                @if($orders->isEmpty())
                <p>You have no orders.</p>
                @else
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->product->name }}</td> <!-- Adjust based on your order relationship -->
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td> <!-- Display the order date -->
                            <td>{{ $order->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </section>

</main>