@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Upcoming Conferences</h1>
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
                    <a href="{{ url('/client/conference/'.$conference['id']) }}" class="btn btn-info">View</a>
                    <form action="{{ url('/client/conference/register') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="conference_id" value="{{ $conference['id'] }}">
                        <button type="submit" class="btn btn-success">Register</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
