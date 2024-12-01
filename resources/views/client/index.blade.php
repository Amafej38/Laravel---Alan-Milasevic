@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Upcoming Conferences</h1>

    <table class="table table-bordered table-hover">
    <thead class="table-primary">
        <tr>
            <th>Conference</th>
            <th>Date</th>
            <th>Registered Users</th>
            <th>Actions</th>
        </tr>
    </thead>
        <tbody>
            @foreach ($conferences as $conference)
                <tr>
                    <td>{{ $conference->name }}</td>
                    <td>{{ $conference->date }}</td>
                    <td>{{ $conference->registered_users_count }}</td>
                    <td>
                        @if ($conference->registered_users_count >= 1)
                            <form action="{{ route('client.conference.unregister') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="conference_id" value="{{ $conference->id }}">
                                <button type="submit" class="btn btn-danger">Unregister</button>
                            </form>
                        @else
                            <form action="{{ route('client.conference.register') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="conference_id" value="{{ $conference->id }}">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
