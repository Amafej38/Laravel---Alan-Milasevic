@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($user) ? 'Edit User' : 'Create User' }}</h1>

    <form action="{{ isset($user) ? route('admin.user.update', $user->id) : route('admin.user.store') }}" method="POST">
        @csrf

        <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" class="form-control"
            value="{{ old('first_name', isset($user) ? $user->first_name : '') }}" required>
        @error('first_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-control"
                value="{{ old('last_name', isset($user) ? $user->last_name : '') }}" required>
            @error('last_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control"
                value="{{ old('email', isset($user) ? $user->email : '') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control"
                {{ isset($user) ? '' : 'required' }}>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                {{ isset($user) ? '' : 'required' }}>
            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role" class="form-control" required>
                <option value="Admin" {{ old('role', isset($user) ? $user->role : '') === 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Employee" {{ old('role', isset($user) ? $user->role : '') === 'Employee' ? 'selected' : '' }}>Employee</option>
                <option value="Client" {{ old('role', isset($user) ? $user->role : '') === 'Client' ? 'selected' : '' }}>Client</option>
            </select>
            @error('role')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update User' : 'Create User' }}</button>

    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const password = document.getElementById('password');
        const passwordConfirmation = document.getElementById('password_confirmation');

        form.addEventListener('submit', function (e) {
            if (password.value !== passwordConfirmation.value) {
                e.preventDefault();
                alert('Passwords do not match. Please try again.');
            }
        });
    });
</script>
@endsection
