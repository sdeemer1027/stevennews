<!-- resources/views/admin/roles/create.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1>Create Role</h1>

    <form action="{{ route('admin.roles.store') }}" method="post">
        @csrf
        <label for="name">Role Name:</label>
        <input type="text" name="name" required>
        <button type="submit">Create Role</button>
    </form>
@endsection
