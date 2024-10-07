@extends('layouts.app')

@section('content')
    <h1>Upcoming Conferences</h1>
    <ul>
        @foreach($conferences as $conference)
            <li>{{ $conference['name'] }} - {{ $conference['date'] }}
                <a href="{{ url('/client/conference/'.$conference['id']) }}">View</a>
                <form action="{{ url('/client/conference/register') }}" method="POST">
                    @csrf
                    <input type="hidden" name="conference_id" value="{{ $conference['id'] }}">
                    <button type="submit">Register</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection