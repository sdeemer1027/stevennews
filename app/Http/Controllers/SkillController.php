<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userprofile;
use App\Models\Skill;


class SkillController extends Controller
{
    

    public function create($userprofile_id)
{
    // You can fetch the user profile data here if needed
    $userprofile = Userprofile::find($userprofile_id);

    // Pass the userprofile_id and any other data to the view
    return view('userprofiles.skill.create', [
        'userprofile_id' => $userprofile_id,
        'userprofile' => $userprofile, // Pass the user profile data to the view if needed
    ]);
}

    public function store(Request $request)
    {

$userprofile_id = $request->userprofile_id;
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',        
           
 //           'userprofile_id' => 'required|integer',
            // Add validation rules for other fields as needed
        ]);

        $skill = new Skill();
        $skill->userprofile_id =$userprofile_id;
        $skill->fill($validatedData);
        $skill->save();

        return redirect()->route('userprofiles.index')->with('success', 'skill added successfully.');
    }



public function edit(Skill $skill)
{
    return view('userprofiles.skill.edit', compact('skill'));
}

public function update(Request $request, Skill $skill)
{
    $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',    
        // Add validation rules for other fields as needed
    ]);

    $skill->update($validatedData);

    return redirect()->route('userprofiles.index')->with('success', 'skill updated successfully.');
}








  public function destroy(Skill $skill)
    {

        $skill->delete();
        return redirect()->route('userprofiles.index')->with('success', 'skill deleted successfully.');
    }

    public function softDelete(Skill $skill)
    {
        // Soft delete logic
    }



}
