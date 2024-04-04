<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    
    public function index()
    {
        // Retrieve the artist information for the authenticated user
        //       $artist = auth()->user()->artist;

        // You can pass $artist to a view or perform other actions here
        return view('artists.index'); //, compact('artist'));
    }
  public function laravel()
    {
        // Retrieve the artist information for the authenticated user
        //       $artist = auth()->user()->artist;

        // You can pass $artist to a view or perform other actions here
        return view('servicelaravel'); //, compact('artist'));
    }
  public function database()
    {
        // Retrieve the artist information for the authenticated user
        //       $artist = auth()->user()->artist;

        // You can pass $artist to a view or perform other actions here
        return view('servicedatabase'); //, compact('artist'));
    }
  public function php()
    {
        // Retrieve the artist information for the authenticated user
        //       $artist = auth()->user()->artist;

        // You can pass $artist to a view or perform other actions here
        return view('servicephp'); //, compact('artist'));
    }

}
