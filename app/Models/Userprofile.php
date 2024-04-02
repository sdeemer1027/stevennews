<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
    use HasFactory;

 protected $fillable = [
    'user_id',
        'first_name',
        'last_name',
        'headline',

        'summary',
        'location',
        'website',
        'phone',
        'image_url',

        // Add other fillable attributes here
    ];




    public function user()
    {
        return $this->belongsTo(User::class);
    }

 public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

  public function educations()
    {
        return $this->hasMany(Education::class);

    }
    public function certifications()
    {
        return $this->hasMany(Certification::class);
        
    }
     public function skills()
    {
        return $this->hasMany(Skill::class);
        
    }

}
