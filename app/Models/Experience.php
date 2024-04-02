<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

protected $fillable = [
    'userprofile_id ',
        'title',
        'company',
        'location',
        'start_date',
        'end_date',
        'description',
        
        // Add other fillable attributes here
    ];



public function userprofile()
    {
        return $this->belongsTo(Userprofile::class);
    }
    
}
