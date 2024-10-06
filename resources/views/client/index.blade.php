@extends('layouts.app')

@section('title', 'Client Conferences')

@section('content')
    <h1>Conferences for Clients</h1>
    <ul>
        @foreach($conferences as $conference)
            <li>
                <a href="{{ url('/conference', $conference->id) }}">{{ $conference->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection