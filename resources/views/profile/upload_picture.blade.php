<!-- resources/views/profile/upload_picture.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Upload Profile Picture</h1>

        <form method="POST" action="{{ route('profile.upload-picture') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="picture" class="form-label">Choose Picture</label>
                <input type="file" class="form-control" id="picture" name="picture" required>
            </div>

            <button type="submit" class="btn btn-primary">Upload Picture</button>
        </form>
    </div>
@endsection
