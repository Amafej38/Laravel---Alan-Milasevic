@extends('layouts.app')

@section('title', 'Conference Details')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">{{ $conference->name }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Date:</strong> {{ $conference->date }}</p>
            <p><strong>Description:</strong> {{ $conference->description }}</p>
        </div>
    </div>

    <p><strong>Registered Users:</strong> {{ $conference->registered_users_count }}</p>
</div>
@endsection
