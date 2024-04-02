@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Adding skills</div>

                <div class="card-body">




                                       <form action="{{ route('userprofiles.skill.store') }}" method="POST">
                    @csrf
                   <div class="form-group"><label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control"></div>

                   <div class="form-group"><label for="level">Level:</label>
                    <select name="level" id="level">
                
                        <option value="beginner">beginner</option>
                        <option value="intermediate">intermediate</option>
                        <option value="advanced">advanced</option>
                    </select>

                   </div>
                   

<input type="hidden" value="{{ $userprofile_id }}" name="userprofile_id" id="userprofile_id"  class="form-control">

                       <!-- Add other education fields as needed -->
                   <button type="submit" class="btn btn-primary">Add Skill</button>
                   </form>


              </div>
            </div>
        </div>
    </div>
</div>
@endsection
