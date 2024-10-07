@extends('layouts.app')

@section('content')
    <h1>Admin: Manage Conferences</h1>
    <a href="{{ url('/admin/conference/create') }}">Create New Conference</a>
    <ul>
        @foreach($conferences as $conference)
            <li>{{ $conference['name'] }} - {{ $conference['date'] }}
                <a href="{{ url('/admin/conference/'.$conference['id'].'/edit') }}">Edit</a>
                <form action="{{ url('/admin/conference/'.$conference['id'].'/delete') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
