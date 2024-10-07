@extends('layouts.app')

@section('title', 'Admin: Manage Users')

@section('content')
<div class="container">
    <h1>Admin: Manage Users</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user['first_name'] }}</td>
                <td>{{ $user['last_name'] }}</td>
                <td>
                    <a href="{{ url('/admin/user/'.$user['id'].'/edit') }}" class="btn btn-warning">Edit</a>
                    <form action="{{ url('/admin/user/'.$user['id'].'/delete') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
