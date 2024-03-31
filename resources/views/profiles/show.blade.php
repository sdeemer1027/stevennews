<!-- resources/views/profiles/show.blade.php -->

@extends('layouts.app')

@section('content')
 <div class="container">
    
    <!-- Add content to display the user's profile details -->
<div class="row">
      <div class="card">
               <div class="card-header"><h1>{{ $user->name }}'s Profile</h1><span style="float:right;"><a href="{{route('dashboard.index')}}">Back to Dashboard</a></span></div> 
            <div class="card-body">


@if(Auth::user() && Auth::user()->id !== $user->id)
        @if(Auth::user()->isFriendWith($user))
            {{-- Display friend-related information or actions --}}
            <p>You are already friends!</p>
            {{-- Add additional actions/buttons for friends --}}
        @elseif(Auth::user()->hasSentFriendRequestTo($user))
            {{-- Display pending friend request information or actions --}}
            <p>Friend request sent. Waiting for approval.</p>
            {{-- Add additional actions/buttons for pending requests --}}
        @else
            {{-- Display friend request button --}}
            <form action="{{ route('send-friend-request', ['friend' => $user]) }}" method="post">
                @csrf
                <button type="submit">Send Friend Request</button>
            </form>
        @endif
    @endif
    @if(!$user->profile->profile_picture)
          No profile Picture set
    @else

             <img src="{{ Storage::url($user->profile->profile_picture) }}" alt="Profile Picture" style="width: 150px; border-radius: 25%;">
     @endif        
 
 <span style="float:right;width: 75%;">
    {{-- 
{!!$user->profile->bio!!}

--}} 
{{$user->profile->bio}}
<hr>
{{--$user->email--}}
From : 
{{$user->city}} {{$user->state}} {{$user->zip}}


</span>


            </div>
<hr>
<h3> The Gallary </h3>
<hr>
<div class="row">


    @foreach($gallery as $pics)
<div class="col-md-4">
{{--$pics--}}

 <img src="{{ Storage::url($pics->picture_location) }}" alt="Picture" style="width: 150px; border-radius: 5%;">
</div>
@endforeach
           </div> 
       </div>




</div>



      {{--$user--}}

{{--$gallery--}}
</div>
@endsection
