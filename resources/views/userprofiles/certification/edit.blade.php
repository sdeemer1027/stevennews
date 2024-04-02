@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Editing Certification</div>

                <div class="card-body">




                                      <form action="{{ route('userprofiles.certification.update', $certification->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Use PUT method for update -->
                    
                   <div class="form-group">
                      <label for="title">Name:</label>
                      <input type="text" name="name" id="name" class="form-control" value="{{ $certification->name }}">
                   </div>





                   

     <div class="form-group"><label for="issuing_organization">issuing_organization:</label>
                    <input type="text" name="issuing_organization" id="issuing_organization" class="form-control" value="{{ $certification->issuing_organization }}"></div>
                   
               <div class="form-group"><label for="issue_date">issue_date:</label>
                <input type="text" name="issue_date" id="issue_date" class="form-control" value="{{ $certification->issue_date }}"></div>

                   <div class="form-group">
                   <label for="expiration_date">expiration_date:</label>
                   <input type="text" name="expiration_date" id="expiration_date" class="form-control" value="{{ $certification->expiration_date }}">
                   </div>
                   
                   <div class="form-group">
                   <label for="description">description:</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ $certification->description }}</textarea>           
                         
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
