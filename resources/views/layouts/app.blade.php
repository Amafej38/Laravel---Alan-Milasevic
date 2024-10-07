<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ url('/client/conferences') }}" class="nav-link">Client</a></li>
                <li class="nav-item"><a href="{{ url('/employee/conferences') }}" class="nav-link">Employee</a></li>
                <li class="nav-item"><a href="{{ url('/admin') }}" class="nav-link">Admin</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>&copy; 2024 Conference Management System</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
