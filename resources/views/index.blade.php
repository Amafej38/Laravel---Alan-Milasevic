<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Alan Milaševič, PIT-22-NL</h1>
    <h2>Welcome to the Conference Management System</h2>
    <p>Choose your role:</p>
    <ul>
        <li><a href="{{ url('/client/conferences') }}">Client</a></li>
        <li><a href="{{ url('/employee/conferences') }}">Employee</a></li>
        <li><a href="{{ url('/admin/') }}">Administrator</a></li>
    </ul>
</body>
</html>