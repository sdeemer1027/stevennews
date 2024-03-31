<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

$abc = ["data" => "some friggen content"];
$cntusers= User::count();
$usersWithRoles = User::with('roles')->get();

//return $usersWithRoles;
        return view('welcome', compact('abc','cntusers','usersWithRoles'));
    }
}
