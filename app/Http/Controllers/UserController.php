<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->paginate(10); //->get();
//$usersl = User::with('profile')->limit(5)->get();

//dd($usersl);
// $receivedRequests = $user->receivedFriendRequests;

        return view('users.index', compact('users'));
    }
}
