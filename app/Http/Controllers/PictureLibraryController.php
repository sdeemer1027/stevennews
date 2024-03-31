<?php
namespace App\Http\Controllers;

use App\Models\PictureLibrary;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PictureLibraryController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $pictures = $user->profile->pictureLibrary;

        return view('picture-library.index', compact('pictures'));
    }

    public function upload(Request $request)
    {
        $request->validate([
  //          'library_name' => 'required|string',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();
        $profile = $user->profile;

        $picturePath = $request->file('profile_picture')->store('profile_pictures', 'public');

        $profile->pictureLibrary()->create([

                   'user_id' => $profile->user_id,
            'library_name' => $request->input('library_name'),
            'picture_location' => 'public/' . $picturePath,

//            'library_name' => $request->input('library_name'),
//            'picture_location' => 'public/' . $picturePath,
//            'picture_name' => $request->file('picture')->getClientOriginalName(),
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Picture uploaded successfully.');
    }

    public function delete($id)
    {
        $user = auth()->user();
        $picture = PictureLibrary::find($id);
        $profile = Profile::where('user_id',$user->id)->first();


      if ($profile) {
    // Update the profile_picture field
 //   $profile->update([
 //       'profile_picture' => '',
 //   ]);

    // Alternatively, you can update a specific field directly
    // $profile->profile_picture = '';
    // $profile->save();
} else {
    // Handle the case where the profile doesn't exist
}

//dd($user,$profile,$profile->profile_picture);




        if (!$picture) {
            return redirect()->route('dashboard.index')->with('error', 'Picture not found.');
        }

        // Delete the file from storage
        Storage::delete($picture->picture_location);

        // Delete the picture record from the database
        $picture->delete();
//dd($user->id);
 //     $profileupdate =  Profile::update([
 //           'profile_picture' => '',
 //       ])->where('user_id',$user->id);

        return redirect()->route('dashboard.index')->with('success', 'Picture deleted successfully.');
    }
}