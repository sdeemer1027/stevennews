<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
      protected $table = 'educations';

protected $fillable = [
        'userprofile_id ',
        'institution',
        'degree',
        'field_of_study',
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
