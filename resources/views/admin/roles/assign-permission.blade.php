<!-- resources/views/admin/roles/assign-permission.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1>Assign Permissions to {{ $role->name }}</h1>

    <form action="{{ route('admin.roles.process-assign-permission', $role) }}" method="post">
        @csrf
        <label for="permissions">Select Permissions:</label>
        <select name="permissions[]" multiple>
            @foreach ($permissions as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
            @endforeach
        </select>
        <button type="submit">Assign Permissions</button>
    </form>
@endsection
