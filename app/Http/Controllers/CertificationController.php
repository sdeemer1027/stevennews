<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userprofile;
use App\Models\Certification;

class CertificationController extends Controller
{
    

    public function create($userprofile_id)
{
    // You can fetch the user profile data here if needed
    $userprofile = Userprofile::find($userprofile_id);

    // Pass the userprofile_id and any other data to the view
    return view('userprofiles.certification.create', [
        'userprofile_id' => $userprofile_id,
        'userprofile' => $userprofile, // Pass the user profile data to the view if needed
    ]);
}

    public function store(Request $request)
    {

$userprofile_id = $request->userprofile_id;
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'issuing_organization' => 'required|string|max:255',        
            'issue_date' => 'required|date',
            'expiration_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',  
 //           'userprofile_id' => 'required|integer',
            // Add validation rules for other fields as needed
        ]);

        $certification = new Certification();
        $certification->userprofile_id =$userprofile_id;
        $certification->fill($validatedData);
        $certification->save();

        return redirect()->route('userprofiles.index')->with('success', 'certification added successfully.');
    }



public function edit(Certification $certification)
{
    return view('userprofiles.certification.edit', compact('certification'));
}

public function update(Request $request, Certification $certification)
{
    $validatedData = $request->validate([
             'name' => 'required|string|max:255',
            'issuing_organization' => 'required|string|max:255',        
            'issue_date' => 'required|date',
            'expiration_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',   
        // Add validation rules for other fields as needed
    ]);

    $certification->update($validatedData);

    return redirect()->route('userprofiles.index')->with('success', 'certification updated successfully.');
}








  public function destroy(Certification $certification)
    {

        $certification->delete();
        return redirect()->route('userprofiles.index')->with('success', 'certification deleted successfully.');
    }

    public function softDelete(Certification $certification)
    {
        // Soft delete logic
    }



}
