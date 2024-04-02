<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

protected $fillable = [
        'userprofile_id ',
        'name',
        'level',        

        // Add other fillable attributes here
    ];
public function userprofile()
    {
        return $this->belongsTo(Userprofile::class);
    }
    
}
