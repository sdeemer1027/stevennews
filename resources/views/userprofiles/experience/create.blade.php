@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Editing Experience</div>

                <div class="card-body">




                                       <form action="{{ route('userprofiles.experience.store') }}" method="POST">
                    @csrf
                   <div class="form-group"><label for="title">Title:</label><input type="text" name="title" id="title" class="form-control"></div>
                   <div class="form-group"><label for="company">Company:</label><input type="text" name="company" id="company" class="form-control"></div>
                   
               <div class="form-group"><label for="location">location:</label><input type="text" name="location" id="location" class="form-control"></div>

                   <div class="form-group">
                   <label for="start_date">start_date:</label>
                   <input type="text" name="start_date" id="start_date" class="form-control">
                   </div>
                   <div class="form-group">
                   <label for="end_date">end_date:</label>
                   <input type="text" name="end_date" id="end_date" class="form-control">
                   </div>
                   <div class="form-group">
                   <label for="description">description:</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>           
                         
                   </div>


<input type="hidden" value="{{ $userprofile_id }}" name="userprofile_id" id="userprofile_id"  class="form-control">

                       <!-- Add other education fields as needed -->
                   <button type="submit" class="btn btn-primary">Add Experience</button>
                   </form>









              </div>
            </div>
        </div>
    </div>
</div>
@endsection
