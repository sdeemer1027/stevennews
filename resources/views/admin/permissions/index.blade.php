<!-- resources/views/admin/permissions/index.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1>Permissions</h1>
    <a href="{{ route('admin.permissions.create') }}">Create Permission</a>

    <ul>
        @foreach ($permissions as $permission)
            <li>{{ $permission->name }}</li>
        @endforeach
    </ul>
@endsection
