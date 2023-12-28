<!-- resources/views/admin/roles/index.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1>Roles</h1>
 {{--    <a href="{{ route('admin.roles.create') }}">Create Role</a>
--}}
    <ul>
        @foreach ($roles as $role)
            <li>{{ $role->name }} (<a href="{{ route('admin.roles.assign-permission', $role) }}">Assign Permissions</a>)</li>
        @endforeach
    </ul>
@endsection
