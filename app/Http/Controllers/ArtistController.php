<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
     public function index()
    {
        // Retrieve the artist information for the authenticated user
        $artist = auth()->user()->artist;

        // You can pass $artist to a view or perform other actions here
        return view('artists.index', compact('artist'));
    }

    public function uploadPicture(Request $request)
    {
        // Handle picture upload logic
        // $request->file('picture') contains the uploaded file

        // You can save the picture information to the database, associate it with the artist, etc.

        return redirect()->route('artists.index')->with('success', 'Picture uploaded successfully.');
    }


     public function aboutsteve(){

$artist = '';

        return view('aboutsteve', compact('artist'));
     }
}
