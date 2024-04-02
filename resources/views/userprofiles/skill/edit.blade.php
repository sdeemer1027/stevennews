@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Editing Skill</div>

                <div class="card-body">




                                      <form action="{{ route('userprofiles.skill.update', $skill->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Use PUT method for update -->
                    
                   <div class="form-group">
                      <label for="title">Name:</label>
                      <input type="text" name="name" id="name" class="form-control" value="{{ $skill->name }}">
                   </div>





                   

     <div class="form-group"><label for="level">Level:</label>
                 
                    <select name="level"  id="level">
                       <option value="beginner" @if( $skill->level == 'beginner' ) selected="selected" @endif>beginner</option>
                        <option value="intermediate" @if( $skill->level == 'intermediate' ) selected="selected" @endif>intermediate</option>
                        <option value="advanced" @if( $skill->level == 'advanced' ) selected="selected" @endif>advanced</option>
                    </select>

                 </div>
               






                   <!-- Add other fields with their corresponding values -->
                   
                   <button type="submit" class="btn btn-primary">Update Experience</button>
                   </form>











              </div>
            </div>
        </div>
    </div>
</div>
@endsection
