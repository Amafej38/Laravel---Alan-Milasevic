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
            @auth
                @if (Auth::user()->role === 'Client')
                    <li class="nav-item"><a href="{{ route('client.conferences.index') }}" class="nav-link">Client</a></li>
                @elseif (Auth::user()->role === 'Employee')
                    <li class="nav-item"><a href="{{ route('employee.index') }}" class="nav-link">Employee</a></li>
                @elseif (Auth::user()->role === 'Admin')
                    <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Admin</a></li>
                @endif
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link" style="cursor:pointer;">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
            @endauth
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
