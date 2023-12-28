<!-- resources/views/layouts/admin.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>

    <nav>
        <a href="{{ route('admin.roles.index') }}">Roles</a>
        <a href="{{ route('admin.permissions.index') }}">Permissions</a>
    </nav>

    <div>
        @yield('content')
    </div>

</body>
</html>
