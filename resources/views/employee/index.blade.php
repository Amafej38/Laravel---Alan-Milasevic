@extends('layouts.app')

@section('title', 'Employee Conferences')

@section('content')
    <h1>All Conferences (Employee View)</h1>
    <ul>
        @foreach($conferences as $conference)
            <li>
                {{ $conference->title }} - {{ $conference->date }}
            </li>
        @endforeach
    </ul>
@endsection