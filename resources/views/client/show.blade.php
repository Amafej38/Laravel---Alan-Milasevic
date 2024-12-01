@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">{{ $conference->name }}</h1>

    <p><strong>Date:</strong> {{ $conference->date }}</p>
    <p><strong>Registered Users:</strong> {{ $conference->registered_users_count }}</p>
    <p><strong>Description:</strong> {{ $conference->description }}</p>

    <a href="{{ route('client.conferences.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection
