@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Adding Certification</div>

                <div class="card-body">




                                       <form action="{{ route('userprofiles.certification.store') }}" method="POST">
                    @csrf
                   <div class="form-group"><label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control"></div>
                   <div class="form-group"><label for="issuing_organization">issuing_organization:</label>
                    <input type="text" name="issuing_organization" id="issuing_organization" class="form-control"></div>
                   
               <div class="form-group"><label for="issue_date">issue_date:</label>
                <input type="text" name="issue_date" id="issue_date" class="form-control"></div>

                   <div class="form-group">
                   <label for="expiration_date">expiration_date:</label>
                   <input type="text" name="expiration_date" id="expiration_date" class="form-control">
                   </div>
                   
                   <div class="form-group">
                   <label for="description">description:</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>           
                         
                   </div>


<input type="hidden" value="{{ $userprofile_id }}" name="userprofile_id" id="userprofile_id"  class="form-control">

                       <!-- Add other education fields as needed -->
                   <button type="submit" class="btn btn-primary">Add Certification</button>
                   </form>









              </div>
            </div>
        </div>
    </div>
</div>
@endsection
