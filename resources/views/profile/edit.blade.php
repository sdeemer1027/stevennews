<!-- resources/views/profile/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Add form fields for name, email, and other profile information -->


            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required>
            </div>

            <div class="mb-3">
                <label for="address2" class="form-label">Address 2</label>
                <input type="text" class="form-control" id="address2" name="address2" value="{{ $user->address2 }}">
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}" required>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state" value="{{ $user->state }}" required>
            </div>

            <div class="mb-3">
                <label for="zip" class="form-label">ZIP Code</label>
                <input type="text" class="form-control" id="zip" name="zip" value="{{ $user->zip }}" required>
            </div>

<div class="mb-3">
    <label for="birth_date" class="form-label">Birth Date</label>
    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $user->birth_date) }}">
</div>

<div class="mb-3">
    <label for="phone_number" class="form-label">Phone Number</label>
    <input type="tel" class="form-control" id="phone_number" name="phone_number" pattern="\(\d{3}\)\d{3}-\d{4}" value="{{ old('phone_number', $user->phone_number) }}">
    <small class="text-muted">Format: (123)456-7890</small>
</div>

            
{{-- 
            <div class="mb-3">
                <label for="library_name" class="form-label">Library Name</label>
                <input type="text" class="form-control" id="library_name" name="library_name">
            </div>
--}}

<div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea class="form-control" id="bio" name="bio">{{ $user->profile->bio }}</textarea>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="make_public" id="make_public" value="1" {{ $user->profile->public ? 'checked' : '' }}>
                <label class="form-check-label" for="make_public">
                    Make Profile Public
                </label>
            </div>
{{--$user-- }}
        <div class="mb-3">
            <a href="{{ route('profile.upload-picture-form') }}" class="btn btn-primary">Upload Profile Picture</a>
            <a href="{{ route('profile.picture-library') }}" class="btn btn-secondary">Picture Library</a>
        </div>
--}}
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
