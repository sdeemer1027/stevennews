<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Role;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    // Other methods for Admin functionalities

 public function users()
    {
$countroles = Role::all();

 $users = User::with('roles')->get();

        return view('admin.users', compact('users','countroles'));
    }

 public function roles()
    {
        $roles = Role::all();
        return view('admin.roles', compact('roles'));
    }

public function addRole($userId, $roleId)
{
 //   $countroles = Role::all();
//    $users = User::with('roles')->get();

   $user = User::findOrFail($userId);
    $role = Role::findOrFail($roleId);

    // Check if the user already has the role
    if (!$user->roles->contains($role)) {
        $user->roles()->attach($role); // Attach the role to the user
    }

    // Redirect back or return a response as needed
    return redirect()->back()->with('success', 'Role added successfully.');


 // return view('admin.users', compact('users','countroles'));

}

public function revokeRole($userId, $roleId)
{
    $user = User::findOrFail($userId);
    $role = Role::findOrFail($roleId);

    // Check if the user has the role before detaching it
    if ($user->roles->contains($role)) {
        $user->roles()->detach($role); // Detach the role from the user
    }

    return redirect()->back()->with('success', 'Role revoked successfully.');
}


public function createrole(Request $request)
{

   // Validate the incoming request data
    $validatedData = $request->validate([
        'role_name' => 'required|string|max:255', // Example validation rules
    ]);

    // Create and store the new role
    $role = new Role();
    $role->name = $validatedData['role_name'];
    $role->guard_name = 'web'; // Example guard name
    $role->save();

    // Optionally, you can return a response to the AJAX request
    return response()->json(['message' => 'Role created successfully'], 200);
}


}
