@extends('layouts.app')

@section('title', 'Admin: Manage Users')

@section('content')
    <h1>Admin: Manage Users</h1>
    <a href="{{ url('/admin/user/create') }}">Create New User</a>
    <ul>
        @foreach ([
            ['id' => 1, 'first_name' => 'John', 'last_name' => 'Doe'],
            ['id' => 2, 'first_name' => 'Jane', 'last_name' => 'Smith']
        ] as $user)
            <li>{{ $user['first_name'] }} {{ $user['last_name'] }}
                <a href="{{ url('/admin/user/'.$user['id'].'/edit') }}">Edit</a>
                <form action="{{ url('/admin/user/'.$user['id'].'/delete') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection