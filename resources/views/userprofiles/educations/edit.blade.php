@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Editing Education</div>

                <div class="card-body">
                   <form action="{{ route('userprofiles.educations.update', $education->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Use PUT method for update -->
                    
                   <div class="form-group">
                      <label for="degree">Degree:</label>
                      <input type="text" name="degree" id="degree" class="form-control" value="{{ $education->degree }}">
                   </div>
                   <div class="form-group">
                      <label for="institution">Institution:</label>
                      <input type="text" name="institution" id="institution" class="form-control" value="{{ $education->institution }}">
                   </div>
                   

     
               <div class="form-group"><label for="field_of_study">field_of_study:</label><input type="text" name="field_of_study" id="field_of_study" class="form-control"  value="{{ $education->field_of_study }}"></div>

                   <div class="form-group">
                   <label for="start_date">start_date:</label>
                   <input type="text" name="start_date" id="start_date" class="form-control"  value="{{ $education->start_date }}">
                   </div>
                   <div class="form-group">
                   <label for="end_date">end_date:</label>
                   <input type="text" name="end_date" id="end_date" class="form-control"  value="{{ $education->end_date }}">
                   </div>
                   <div class="form-group">
                   <label for="description">description:</label>
                   <input type="text" name="description" id="description" class="form-control"  value="{{ $education->description }}">                    
                   </div>

                   <div class="mb-3">
                   <label for="summary" class="form-label">Summary</label>
                   <textarea class="form-control" id="summary" name="summary" rows="4">{{ $education->summary }}</textarea>
                   </div>





                   <!-- Add other fields with their corresponding values -->
                   
                   <button type="submit" class="btn btn-primary">Update Education</button>
                   </form>






              
              































              </div>
            </div>
        </div>
    </div>
</div>
@endsection
