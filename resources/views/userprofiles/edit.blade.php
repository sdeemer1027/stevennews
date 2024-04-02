@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit User Profile</h1>
        <form action="{{ route('userprofiles.update', $userprofile->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $userprofile->first_name }}" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $userprofile->last_name }}" required>
            </div>
             <div class="mb-3">
                <label for="headline" class="form-label">Headline</label>
                <input type="text" class="form-control" id="headline" name="headline" value="{{ $userprofile->headline }}" required>
            </div>

             <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="text"  class="form-control" id="website" name="website" value="{{ $userprofile->website }}">
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location / State</label>
                <input type="text"  class="form-control" id="location" name="location" value="{{ $userprofile->location }}">
            </div>
<div class="mb-3">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $userprofile->phone ?? '') }}">
   
</div>

             <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <textarea class="form-control" id="summary" name="summary" rows="4">{{ $userprofile->summary }}</textarea>
            </div>
{{-- $userprofile->image_url --}}

             
<div class="mb-3">
    <label for="image" class="form-label">Profile Image</label>

 @if(!$userprofile->image_url)
          No profile Picture set
    @else
     <img src="{{ Storage::url($userprofile->image_url) }}" alt="Profile Picture" style="width: 150px; border-radius: 25%;">

     @endif  

   
    <input type="file" class="form-control" id="image" name="image" accept="image/*">
    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>


            
            <!-- Add other form fields as needed -->
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>













    </div>
@endsection
