@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @auth
                {{--$userprofiles--}}
                <div class="card-header">{{ __('Your Resmue') }} @if(Auth::check() && $userprofiles->isNotEmpty())  @else <a href="{{ route('userprofiles.create') }}" class="btn btn-primary" style="float: right;">Create New Profile</a>@endif</div>

                <div class="card-body">
    <style>
        .card-header {
            background-color: blue; /* Set background color of the card header */
            color: white; /* Set text color of the card header */
            cursor: pointer; /* Add pointer cursor to indicate clickable */
        }
        
    </style>

@foreach($userprofiles as $userprofile)

        <div class="card">
            <div class="card-header">Profile

 <form action="{{ route('userprofiles.destroy', $userprofile->id) }}" method="POST" style="float:right;">
                                       <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                       <a href="{{ route('userprofiles.edit', $userprofile->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>                    
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this article?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>



            </div>
            <div class="card-body" id="profile1">
                
<h3>{{ $userprofile->headline }}</h3>
<div class="row">
   <div class="col-md-3">
    @if(!$userprofile->image_url)
          No profile Picture set
    @else
     <img src="{{ Storage::url($userprofile->image_url) }}" alt="Profile Picture" style="width: 150px; border-radius: 25%;">
     @endif  </div>
     <div class="col-md-7">
        <h3>{{ $userprofile->first_name }} {{ $userprofile->last_name }}</h3>
            {{ $userprofile->location }}<BR>
            {{ $userprofile->website }}<br>
            {{ $userprofile->phone }}<br>
     </div>
  </div>
{{ $userprofile->summary }}<br>

            </div>
        </div>





        <div class="card">
            <div class="card-header" >Education <a href="{{ route('userprofiles.educations.create', ['userprofile_id' => $userprofile->id]) }}" class="btn btn-primary" style="float: right;">Add Education</a></div>
            <div class="card-body" id="education1">
                
        <table class="table mt-3">
          <thead>
                <tr>
                    <th>Institution</th>
                    <th>Degree</th>
                    <th>Field of Study</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userprofile->educations as $education)
                    <tr>                  
                        <td>{{ $education->institution }}</td>
                        <td>{{ $education->degree }}</td>
                        <td>{{ $education->field_of_study }}</td>
                        <td>{{ $education->start_date }}</td>
                        <td>{{ $education->end_date }}</td>
                        <td>{{ $education->description }}</td>
                        <td>                            
                            <a href="{{ route('userprofiles.educations.edit', $education->id) }}" class="btn btn-warning">Edit</a>
                          <form action="{{ route('userprofiles.educations.destroy', $education->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this education?')">Delete</button>
</form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


            </div>
        </div>




        <div class="card">
            <div class="card-header" >Experience<a href="{{ route('userprofiles.experience.create', ['userprofile_id' => $userprofile->id]) }}" class="btn btn-primary" style="float: right;">Add Experience</a></div>
            <div class="card-body" id="experience1">
                
        <table class="table mt-3">
          <thead>
                <tr>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userprofile->experiences as $experience)
                    <tr>                  
                        <td>{{ $experience->title }}</td>
                        <td>{{ $experience->Company }}</td>                        
                        <td>{{ $experience->start_date }}</td>
                        <td>{{ $experience->end_date }}</td>
                        <td>{{ $experience->description }}</td>
                        <td>                            
                            <a href="{{ route('userprofiles.experience.edit', $experience->id) }}" class="btn btn-warning">Edit</a>
                          <form action="{{ route('userprofiles.experience.destroy', $experience->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this education?')">Delete</button>
</form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>













            </div>
        </div>

















        <div class="card">
            <div class="card-header">Certification
            <a href="{{ route('userprofiles.certification.create', ['userprofile_id' => $userprofile->id]) }}" class="btn btn-primary" style="float: right;">Add Certification</a>
            </div>
            <div class="card-body" id="certification1">
                
    <table class="table mt-3">
          <thead>
                <tr>
                    <th>Title</th>
                    <th>Company</th>
                    <th>start_date</th>
                    <th>end_date</th>
                    <th>description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userprofile->certifications as $certification)
                    <tr>                  
                        <td>{{ $certification->name }}</td>
                        <td>{{ $certification->issuing_organization }}</td>                        
                        <td>{{ $certification->issue_date }}</td>
                        <td>{{ $certification->expiration_date }}</td>
                        <td>{{ $certification->description }}</td>
                        <td>                            
                            <a href="{{ route('userprofiles.certification.edit', $certification->id) }}" class="btn btn-warning">Edit</a>
                          <form action="{{ route('userprofiles.certification.destroy', $certification->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this certification?')">Delete</button>
</form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>










            </div>
        </div>
        <div class="card">
            <div class="card-header">Skill<a href="{{ route('userprofiles.skill.create', ['userprofile_id' => $userprofile->id]) }}" class="btn btn-primary" style="float: right;">Add Skills</a></div>
            <div class="card-body" id="skill1">
               
        <table class="table mt-3">
          <thead>
                <tr>
                    <th>Name</th>
                    <th>Level</th>                    
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userprofile->skills as $skill)
                    <tr>                  
                        <td>{{ $skill->name }}</td>
                        <td>{{ $skill->level }}</td>                        
                        
                        <td>                            
                            <a href="{{ route('userprofiles.skill.edit', $skill->id) }}" class="btn btn-warning">Edit</a>
                          <form action="{{ route('userprofiles.skill.destroy', $skill->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this skill?')">Delete</button>
</form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>






            </div>
        </div>

@endforeach


<BR><BR><BR><BR>

      



 @else
            <!-- Show a message or redirect to login if user is not logged in -->
            <p>You need to be logged in to create a profile. Please <a href="{{ route('login') }}">login</a>.</p>
        @endauth

            </div>
        </div>
    </div>
</div>
@endsection