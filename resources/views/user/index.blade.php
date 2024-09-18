<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <!-- Include your CSS files here -->
</head>
<body>
    <header>
        <h1>User Dashboard</h1>
        <nav>
            <ul>
                <li><a href="{{ route('user.viewProducts') }}">View Products</a></li>
                <li><a href="{{ route('order.store') }}">Place Order</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Main content for user dashboard -->
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Your Company</p>
    </footer>
</body>
</html>
