<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userprofile;

class UserprofileController extends Controller
{
    public function index()
    {
  $user_id = auth()->user()->id;

        $userprofiles = Userprofile::with(['experiences','educations','certifications','skills'])
        ->where('user_id',$user_id)->get();    
        return view('userprofiles.index', compact('userprofiles'));
    }

    public function create()
    {
        return view('userprofiles.create');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

       // dd($user_id);

    $validatedData = $request->validate([
  
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        // Add validation rules for other fields here
    ]);

    $userprofile = new Userprofile();
    $userprofile->user_id = $user_id; // Assign the authenticated user's ID to user_id

    $userprofile->fill($validatedData);
    $userprofile->save();

    return redirect()->route('userprofiles.index')->with('success', 'User profile created successfully.');



    }

    public function show(Userprofile $userprofile)
    {
        return view('userprofiles.show', compact('userprofile'));
    }

    public function edit(Userprofile $userprofile)
    {
        return view('userprofiles.edit', compact('userprofile'));
    }

    public function update(Request $request, Userprofile $userprofile)
    {



       
       $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'headline' => 'nullable|string|max:255',
        'summary' => 'nullable|string', 
        'location' => 'nullable|string|max:255',
        'website' => 'nullable|string|max:255',        
        'phone' => 'nullable|string|max:20',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
 
        // Add validation rules for other fields here
    ]);

if ($request->hasFile('image')) {
    $image = $request->file('image');
    $imagePath = $image->store('public/images'); // Adjust the storage path as needed
    $validatedData['image_url'] = $imagePath;
}

    $userprofile->update($validatedData);

    return redirect()->route('userprofiles.index')->with('success', 'User profile updated successfully.');



    }

    public function destroy(Userprofile $userprofile)
    {
        $userprofile->delete();
        return redirect()->route('userprofiles.index')->with('success', 'User profile deleted successfully.');
    }

    public function softDelete(Userprofile $userprofile)
    {
        // Soft delete logic
    }
}
