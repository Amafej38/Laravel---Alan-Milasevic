@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($conference) ? 'Edit Conference' : 'Create Conference' }}</h1>

    <form action="{{ isset($conference) ? route('admin.conference.update', $conference->id) : route('admin.conference.store') }}" method="POST">
        @csrf
        @if(isset($conference))
            @method('POST')
        @endif

        <div class="form-group">
            <label for="name">Conference Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ isset($conference) ? $conference->name : '' }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" required>{{ isset($conference) ? $conference->description : '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ isset($conference) ? $conference->date : '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($conference) ? 'Update Conference' : 'Create Conference' }}</button>
    </form>
</div>
@endsection
