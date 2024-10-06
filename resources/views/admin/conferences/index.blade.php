@extends('layouts.app')

@section('title', 'Manage Conferences')

@section('content')
    <h1>Conference Management (Admin)</h1>
    <a href="{{ url('/admin/conferences/create') }}">Create New Conference</a>

    <ul>
        @foreach($conferences as $conference)
            <li>
                {{ $conference->title }} - 
                <a href="{{ url('/admin/conferences/edit', $conference->id) }}">Edit</a> |
                <a href="{{ url('/admin/conferences/delete', $conference->id) }}">Delete</a>
            </li>
        @endforeach
    </ul>
@endsection