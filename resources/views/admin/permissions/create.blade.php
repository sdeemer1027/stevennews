<!-- resources/views/admin/permissions/create.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1>Create Permission</h1>

    <form action="{{ route('admin.permissions.store') }}" method="post">
        @csrf
        <label for="name">Permission Name:</label>
        <input type="text" name="name" required>
        <button type="submit">Create Permission</button>
    </form>
@endsection
