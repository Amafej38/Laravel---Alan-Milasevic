@extends('layouts.app')

@section('content')
    <h1>{{ isset($conference) ? 'Edit' : 'Create' }} Conference</h1>
    <form action="{{ isset($conference) ? url('/admin/conference/'.$conference['id'].'/update') : url('/admin/conference/store') }}" method="POST">
        @csrf
        <label for="name">Conference Name</label>
        <input type="text" id="name" name="name" value="{{ isset($conference) ? $conference['name'] : '' }}" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" required>{{ isset($conference) ? $conference['description'] : '' }}</textarea>

        <button type="submit">{{ isset($conference) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
