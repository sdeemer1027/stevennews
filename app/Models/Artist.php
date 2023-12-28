<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        // Add other fillable fields
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
