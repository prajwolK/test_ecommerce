{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Commerce')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        nav {
            background-color: #2d3748;
            color: white;
            padding: 1rem;
        }
        nav a {
            margin-right: 1rem;
            color: white;
            text-decoration: none;
        }
        nav a:hover {
            text-decoration: underline;
        }
        main {
            padding: 2rem;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="{{ route('categories.index') }}">Categories</a>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
</body>
</html>
