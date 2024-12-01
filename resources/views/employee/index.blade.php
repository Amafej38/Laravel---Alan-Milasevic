@extends('layouts.app')

@section('title', 'All Conferences')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">All Conferences</h1>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>Conference</th>
                <th>Date</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conferences as $conference)
                <tr>
                    <td>{{ $conference->name }}</td>
                    <td>{{ $conference->date }}</td>
                    <td>{{ $conference->date > now() ? 'upcoming' : 'past' }}</td>
                    <td class="text-center">
                        <a href="{{ route('employee.conference.show', $conference->id) }}" class="btn btn-sm btn-primary">View Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
