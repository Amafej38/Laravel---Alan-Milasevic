@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin: Manage Conferences</h1>
    <a href="{{ url('/admin/conference/create') }}" class="btn btn-primary mb-3">Create New Conference</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Conference</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conferences as $conference)
            <tr>
                <td>{{ $conference['name'] }}</td>
                <td>{{ $conference['date'] }}</td>
                <td>
                    <a href="{{ url('/admin/conference/'.$conference['id'].'/edit') }}" class="btn btn-warning">Edit</a>
                    <form action="{{ url('/admin/conference/'.$conference['id'].'/delete') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
