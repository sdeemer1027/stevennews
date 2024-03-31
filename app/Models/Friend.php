<?php

// app/Models/Friend.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'friend_id', 'approved'];


  // Define the inverse relationship with User for outgoing friend requests
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define the inverse relationship with User for incoming friend requests
    public function recipient()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
