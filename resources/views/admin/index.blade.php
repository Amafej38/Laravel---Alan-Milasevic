@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Select what you want to manage:</p>
    <ul>
        <li><a class="a_button" href="{{ url('/admin/users') }}">Manage Users</a></li>
        <li><a class="a_button" href="{{ url('/admin/conferences') }}">Manage Conferences</a></li>
    </ul>
@endsection