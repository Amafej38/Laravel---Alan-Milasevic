<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Conference Management System')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/conferences') }}">Conferences</a></li>
            <li><a href="{{ url('/employee/conferences') }}">Employee Panel</a></li>
            <li><a href="{{ url('/admin/conferences') }}">Admin Panel</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>