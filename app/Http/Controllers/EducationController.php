<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\Userprofile;

class EducationController extends Controller
{



    public function create($userprofile_id)
{
    // You can fetch the user profile data here if needed
    $userprofile = Userprofile::find($userprofile_id);

    // Pass the userprofile_id and any other data to the view
    return view('userprofiles.educations.create', [
        'userprofile_id' => $userprofile_id,
        'userprofile' => $userprofile, // Pass the user profile data to the view if needed
    ]);
}

    public function store(Request $request)
    {

$userprofile_id = $request->userprofile_id;
        $validatedData = $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',           
            'field_of_study' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',  
            'userprofile_id' => 'required|integer',
            // Add validation rules for other fields as needed
        ]);

        $education = new Education();
        $education->userprofile_id =$userprofile_id;
        $education->fill($validatedData);
        $education->save();

        return redirect()->route('userprofiles.index')->with('success', 'Education added successfully.');
    }



public function edit(Education $education)
{
    return view('userprofiles.educations.edit', compact('education'));
}

public function update(Request $request, Education $education)
{
    $validatedData = $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',           
            'field_of_study' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',  
            'userprofile_id' => 'required|integer',
        // Add validation rules for other fields as needed
    ]);

    $education->update($validatedData);

    return redirect()->route('userprofiles.index')->with('success', 'Education updated successfully.');
}








  public function destroy(Education $education)
    {

   //     dd($education);

        $education->delete();
        return redirect()->route('userprofiles.index')->with('success', 'User profile deleted successfully.');
    }

    public function softDelete(Education $education)
    {
        // Soft delete logic
    }



}
