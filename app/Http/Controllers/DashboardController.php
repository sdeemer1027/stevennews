<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\Profiles;
use App\Models\PictureLibrary;
use App\Models\User;
use App\Models\Friend;

class DashboardController extends Controller
{
    public function index()
    {
        $user =auth()->user();
           // Eager load the 'profile' relationship
        $user->load('profile');

        // Retrieve the dashboard information for the authenticated user
        $dashboard = auth()->user()->dashboard;

        $pictures = PictureLibrary::where('user_id', $user->id)->get();   // $profile->picture_library ?? [];
        
        $friends = $user->friends;
        $sentRequests = $user->friendRequests;
        $receivedRequests = $user->receivedFriendRequests;

 //$friendpics= Profiles::where('user_id',$user->friends->id)->get();

//dd($friendpics);  ,'friendpics'

        return view('dashboard.index', compact('dashboard','user','pictures', 
                                               'friends', 'sentRequests', 'receivedRequests'));
    }


}
