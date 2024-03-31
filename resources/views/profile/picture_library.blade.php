<!-- resources/views/profile/picture_library.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Picture Library</h1>
{{--$pictures--}}
        <!-- Display the pictures in the library -->
        @if(count($pictures) > 0)
            <div class="row">
                {{--$pictures--}}
                @foreach($pictures as $picture)
                    <div class="col-md-4">
                       {{--  <img src="{{ asset('storage/' . $picture->picture_location) }}" alt="Picture" class="img-fluid"> --}}
                         <img src="{{ Storage::url($picture->picture_location) }}" alt="Picture" style="width: 150px;border-radius: 25%;">
                    </div>
                @endforeach
            </div>
        @else
            <p>No pictures in the library.</p>
        @endif
       
{{--$user--}}

        {{-- 
@foreach ($user->profile->pictureLibrary as $picture)
    <div>
        <img src="{{ asset($picture->picture_location) }}" alt="{{ $picture->picture_name }}">
        <p>{{ $picture->library_name }}</p>
    </div>
@endforeach
--}}
{{-- 
@foreach ($user->profile->pictureLibrary as $picture)
    <div>
        <img src="{{ asset($picture->picture_location) }}" alt="{{ $picture->picture_name }}">
        <p>{{ $picture->library_name }}</p>
    </div>
@endforeach

--}}


    </div>
@endsection
