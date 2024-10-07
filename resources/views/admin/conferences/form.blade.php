@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($conference) ? 'Edit' : 'Create' }} Conference</h1>
    <form action="{{ isset($conference) ? url('/admin/conference/'.$conference['id'].'/update') : url('/admin/conference/store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Conference Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ isset($conference) ? $conference['name'] : '' }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" required>{{ isset($conference) ? $conference['description'] : '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($conference) ? 'Update' : 'Create' }}</button>
    </form>
</div>
@endsection
