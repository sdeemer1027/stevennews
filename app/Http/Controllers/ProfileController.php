<?php

namespace App\Http\Controllers;

use App\Models\PictureLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Carbon\Carbon;

class ProfileController extends Controller
{
    
    public function edit()
    {
        // Retrieve the authenticated user's profile information
        $user = auth()->user();

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Validate the form data
        $request->validate([
             'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:10',
            'bio' => 'nullable|string',
            'make_public' => 'boolean',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add a rule for the profile picture
            'library_name' => 'nullable|string',

            'birth_date' => 'nullable|date',
            'phone_number' => 'nullable|regex:/\(\d{3}\)\d{3}-\d{4}/',
        
    
        ]);
 //dd($request);
        // Update user information
         // Update the user's profile with the new data
        auth()->user()->update($request->only(['birth_date', 'phone_number', /* other fields */]));

        $user = auth()->user();
        $user->update([
           'username' => $request->input('username'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'address2' => $request->input('address2'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'zip' => $request->input('zip'),
            'birth_date' => $request->input('birth_date'), 
            'phone_number' => $request->input('phone_number'),
            // Update other fields as needed
        ]);

        // Update profile visibility
        $profile = $user->profile;
        $profile->update([
            'bio' => $request->input('bio'),
            'public' => $request->input('make_public', false),
        ]);
//dd($request,$profile);
// Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $picturePath = $request->file('profile_picture')->store('profile_pictures', 'public');

            $profile->pictureLibrary()->create([
                'user_id' => $profile->user_id,
            'library_name' => $request->input('library_name'),
            'picture_location' => 'public/' . $picturePath,
      //      'picture_name' => $request->file('picture')->getClientOriginalName(),
        ]);
        }


//dd($request,$profile,$request->file('picture')->getClientOriginalName());

        return redirect()->route('dashboard.index')->with('success', 'Profile updated successfully.');
    }

    
    public function showPictureUploadForm()
    {
        return view('profile.upload_picture');
    }

    public function uploadPicture(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();
        $profile = $user->profile;

        // Store the uploaded picture
        $path = $request->file('picture')->store('profile_pictures', 'public');

// Create a new pictureLibrary record
$newPicture = $profile->pictureLibrary()->create([
    'user_id' => $profile->user_id,
    'library_name' => $request->input('library_name'),
    'picture_location' => 'public/' . $path,
]);

// Access the ID of the newly created pictureLibrary record
$createdId = $newPicture->id;
//dd($profile,$createdId);
        // Update the profile_picture field
        $profile->update(['profile_picture' => $path, 'picture_library' => $createdId]);

        return redirect()->route('dashboard.index')->with('success', 'Profile picture uploaded successfully.');
    }

      public function showPictureLibrary()
    {
        $user = auth()->user();
        $profile = $user->profile;

        $pictures = PictureLibrary::where('user_id', $user->id)->get();   // $profile->picture_library ?? [];





//dd($profile,$pictures);
        return view('profile.picture_library', compact('pictures','user'));
    }

     protected function createProfile(User $user)
    {
        // Create a profile for the user
        $profile = $user->profile()->create();

        // Create a default picture library for the profile
        $pictureLibrary = $profile->pictureLibrary()->create([
            'library_name' => 'Default Library',
        ]);

        // You can add default picture details if needed
        $pictureLibrary->update([
            'picture_location' => 'default_location',
            'picture_name' => 'default_picture.jpg',
        ]);
    }


    public function changeProfilePicture(Request $request)
    {
        $user = auth()->user();
//dd($request);
        // Validate the request
        $request->validate([
//            'new_profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store the new profile picture
        $path = $request->picture_location;

        // Update the user's profile picture
        $user->profile->update([
            'profile_picture' =>  $path,
            'picture_library' => $request->pictur_library,
            'user_id'  =>$request->userid,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Profile picture changed successfully.');
    }


 public function show(User $user)
    {
        // Check if the user's profile is set to be visible
        if ($user->profile && $user->profile->public) {

$gallery = PictureLibrary::where('user_id',$user->id)->get();
if($user->birthdate){
$formattedBirthdate = Carbon::createFromFormat('m/d/Y', $user->birthdate)->format('m/d/Y');
}
//dd($user->profile,$gallery);

            return view('profiles.show', compact('user','gallery'));
        } else {
            // Handle the case where the profile is not visible
            return redirect()->route('dashboard.index')->with('error', 'Profile not visible.');
        }
    }

}
