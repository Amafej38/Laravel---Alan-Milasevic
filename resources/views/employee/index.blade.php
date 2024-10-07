@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Conferences</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Conference</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conferences as $conference)
            <tr>
                <td>{{ $conference['name'] }}</td>
                <td>{{ $conference['date'] }}</td>
                <td>{{ $conference['status'] }}</td>
                <td><a href="{{ url('/employee/conference/'.$conference['id']) }}" class="btn btn-info">View Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
