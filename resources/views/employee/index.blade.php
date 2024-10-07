@extends('layouts.app')

@section('content')
    <h1>All Conferences</h1>
    <ul>
        @foreach($conferences as $conference)
            <li>{{ $conference['name'] }} - {{ $conference['date'] }} ({{ $conference['status'] }})
                <a href="{{ url('/employee/conference/'.$conference['id']) }}">View Details</a>
            </li>
        @endforeach
    </ul>
@endsection