@extends('layouts.app')

@section('title', isset($conference) ? 'Edit Conference' : 'Create Conference')

@section('content')
    <h1>{{ isset($conference) ? 'Edit Conference' : 'Create Conference' }}</h1>

    <form action="{{ isset($conference) ? url('/admin/conferences/update', $conference->id) : url('/admin/conferences/store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ $conference->title ?? '' }}">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description">{{ $conference->description ?? '' }}</textarea>
        </div>
        <button type="submit">{{ isset($conference) ? 'Update' : 'Create' }}</button>
    </form>
@endsection