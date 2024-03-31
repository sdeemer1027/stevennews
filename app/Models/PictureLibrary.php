<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PictureLibrary extends Model
{
    use HasFactory;
     protected $fillable = [
       'user_id',
        'library_name',
        'picture_location',
        'picture_name',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
