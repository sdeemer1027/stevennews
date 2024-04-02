<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

protected $fillable = [
    'userprofile_id ',
        'name',
        'issuing_organization',
        'issue_date',
        'expiration_date',        
        'description',
        
        // Add other fillable attributes here
    ];

 public function userprofile()
    {
        return $this->belongsTo(Userprofile::class);
    }

    
}
