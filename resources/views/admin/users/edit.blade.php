@extends('layouts.app')

@section('title', isset($user) ? 'Edit User' : 'Create User')

@section('content')
    <h1>{{ isset($user) ? 'Edit' : 'Create' }} User</h1>

    <form action="{{ isset($user) ? url('/admin/user/'.$user['id'].'/update') : url('/admin/user/store') }}" method="POST">
        @csrf
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="{{ isset($user) ? $user['first_name'] : '' }}" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="{{ isset($user) ? $user['last_name'] : '' }}" required>

        <button type="submit">{{ isset($user) ? 'Update User' : 'Create User' }}</button>
    </form>
@endsection