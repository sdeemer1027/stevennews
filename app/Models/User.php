<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'address', 'address2', 'city', 'state', 'zip', 'lat', 'lng',
        'birth_date',
        'phone_number',
    ];
    
    const USERNAME_FIELD = 'email';// 'username';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 public function hasFriendInCommon(User $friend)
    {
        // Check if the friend is a friend of anyone else on your friend list
        return $this->friends()->whereHas('friends', function ($query) use ($friend) {
            $query->where('friend_id', $friend->id);
        })->exists();
    }
 public function hasPendingFriendRequestFrom($user)
    {
        return $this->incomingFriendRequests()
        ->where('user_id', $user->id)
        ->where('approved', 0) // Check for pending requests
        ->exists();
    }

    public function incomingFriendRequests()
    {
        return $this->hasMany(Friend::class, 'friend_id')
            ->where('approved', 0); // Assuming 'approved' column indicates pending requests
    }

    
    public function artist()
    {
        return $this->hasOne(Artist::class);
    }


public function profile()
{
    return $this->hasOne(Profile::class);
}
    


 public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
            ->wherePivot('approved', true)
            ->withTimestamps();
    }

    public function friendRequests()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
            ->wherePivot('approved', false)
            ->withTimestamps();
    }

    public function sendFriendRequest(User $friend)
    {
        $this->friendRequests()->attach($friend);
    }

    public function approveFriendRequest(User $friend)
    {
        $this->friendRequests()->updateExistingPivot($friend, ['approved' => true]);
        $friend->friends()->attach($this);
    }

    public function cancelFriendRequest(User $friend)
    {
        $this->friendRequests()->detach($friend);
    }

    public function removeFriend(User $friend)
    {
        $this->friends()->detach($friend);
        $friend->friends()->detach($this);
    }



//public function isFriendWith(User $user)
//{
//    return $this->friends()->where('id', $user->id)->exists();
//}

//public function hasSentFriendRequestTo(User $user)
//{
//    return $this->friendRequests()->where('id', $user->id)->exists();
//}

    public function isFriendWith(User $user)
    {
        return $this->friends()->where('users.id', $user->id)->exists();
    }

    public function hasSentFriendRequestTo(User $user)
    {
        return $this->friendRequests()->where('users.id', $user->id)->exists();
    }

 public function receivedFriendRequests()
    {
 //       return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
 //           ->wherePivot('approved', false)
 //           ->withTimestamps();
    

        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
            ->where('approved', false)
            ->withTimestamps();


    }
    


}
