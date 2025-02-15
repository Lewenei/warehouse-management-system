<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Organization</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f7f7f7;
            color: #333;
        }

        header {
            background: #fed700;
            color: black;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        nav {
            margin: 20px 0;
        }

        nav a {
            margin: 0 15px;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        nav a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 30px;
        }

        .section-title {
            margin-top: 20px;
            font-size: 1.8em;
            color: #ed3237;
            text-align: center;
        }

        .section {
            margin: 20px 0;
            padding: 15px;
            border-radius: 8px;
            background: #f1f1f1;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background: #fed700;
            color: black;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .btn {
            background: #3c3c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
            margin: 0 10px;
            /* Add horizontal spacing */
        }

        .btn:hover {
            background: #aa5900;
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2em;
            }

            .section-title {
                font-size: 1.5em;
            }
        }

        .logo {
            max-width: 100px;
            /* Adjust as needed */
            margin-bottom: 10px;
        }

        .auth-buttons {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
    </style>
</head>

<body>

    <header>
        <img src="{{ asset('assets/img/kdlLogo.png') }}" alt="Khetia Drapers Limited Logo" class="logo">
        <h1>Your Organization Name</h1>
    </header>

    <div class="container">
        <h2 class="section-title">Welcome to Our Organization</h2>
        <div class="section">
            <p>
                Our Organization is a fast-growing company registered in rendering services and products to its clients from diversified regions.
            </p>
            <h3>Our Services</h3>
            <p>
                To our Customers, we offer you Retail services of a wide range of products such as; Entertainment and Electronic equipments, Fresh & Groceries food, Home-Care & Detergents, Beauty and Clothe-Wares, Stationeries, Furniture, Hardware and Machineries, Households, Agricultural inputs and Foot-Wares from both local and foreign manufacturers.
            </p>
            <div class="auth-buttons">
                <a href="{{ route('customer.login') }}" class="btn btn-primary btn-lg mx-2">Customer Login</a>
                <a href="{{ route('customer.register') }}" class="btn btn-secondary btn-lg mx-2">Customer Register</a>
            </div>
        </div>


        <div class="auth-buttons">
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="btn">Admin Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn">Admin Register</a>
            @endif
            @endauth
            @endif
        </div>
    </div>

    <footer>
        &copy; {{ date('Y') }} Our Organization. All rights reserved.
    </footer>

</body>

</html>