<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\Userprofile;

class ExperienceController extends Controller
{



    public function create($userprofile_id)
{
    // You can fetch the user profile data here if needed
    $userprofile = Userprofile::find($userprofile_id);

    // Pass the userprofile_id and any other data to the view
    return view('userprofiles.experience.create', [
        'userprofile_id' => $userprofile_id,
        'userprofile' => $userprofile, // Pass the user profile data to the view if needed
    ]);
}

    public function store(Request $request)
    {

$userprofile_id = $request->userprofile_id;
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',           
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',  
 //           'userprofile_id' => 'required|integer',
            // Add validation rules for other fields as needed
        ]);

        $experience = new Experience();
        $experience->userprofile_id =$userprofile_id;
        $experience->fill($validatedData);
        $experience->save();

        return redirect()->route('userprofiles.index')->with('success', 'experience added successfully.');
    }



public function edit(Experience $experience)
{
    return view('userprofiles.experience.edit', compact('experience'));
}

public function update(Request $request, Experience $experience)
{
    $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',           
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',  
        // Add validation rules for other fields as needed
    ]);

    $experience->update($validatedData);

    return redirect()->route('userprofiles.index')->with('success', 'Experience updated successfully.');
}








  public function destroy(Experience $experience)
    {

   //     dd($education);

        $experience->delete();
        return redirect()->route('userprofiles.index')->with('success', 'experience deleted successfully.');
    }

    public function softDelete(Experience $experience)
    {
        // Soft delete logic
    }



}
