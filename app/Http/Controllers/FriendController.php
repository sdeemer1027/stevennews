<?php

// app/Http/Controllers/FriendController.php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FriendController extends Controller
{
    public function sendRequest(User $friend)
    {
 
 $user = Auth::user();

    // Check if the users are already friends
    if ($user->isFriendWith($friend)) {
        return back()->with('error', 'You are already friends!');
    }

    // Check if a friend request already exists
    if ($user->hasSentFriendRequestTo($friend)) {
        return back()->with('error', 'Friend request already sent!');
    }

    // Check if the friend is a friend of anyone else on your friend list
    if ($user->hasFriendInCommon($friend)) {
        return back()->with('warning', 'Suggested friend!');
    }

    // Send the friend request
    $user->sendFriendRequest($friend);

    return back()->with('success', 'Friend request sent!');
    }

    public function cancelRequest(Friend $friend)
    {
        Auth::user()->cancelFriendRequest($friend);

        return back()->with('success', 'Friend request canceled!');
    }

    public function removeFriend(Friend $friend)
    {
        Auth::user()->removeFriend($friend);

        return back()->with('success', 'Friend removed!');
    }

public function approveRequest(User $friend)
{

    Auth::user()->approveFriendRequest($friend);

$friendApproval = Friend::where('user_id', Auth::user()->id)
    ->where('friend_id', $friend->id)
    ->update(['approved' => 1]);
    $friendApproval = Friend::where('user_id', $friend->id )
    ->where('friend_id', Auth::user()->id)
    ->update(['approved' => 1]);

    return back()->with('success', 'Friend request approved!');
}

}
