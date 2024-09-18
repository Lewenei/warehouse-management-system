<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <!-- Include your CSS files here -->
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="{{ route('admin.registerForm') }}">Register User</a></li>
                <li><a href="{{ route('products.index') }}">Manage Products</a></li>
                <li><a href="{{ route('locations.index') }}">Manage Locations</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Main content for admin dashboard -->
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Your Company</p>
    </footer>
</body>
</html>
