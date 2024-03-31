<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Browse Users</h1>
<table class="table table-dark table-hover">
   <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col"></th>
      <th scope="col">Users Role</th>
      <th scope="col">Friend</th>
    </tr>
  </thead>
  <tbody>

@foreach($users as $user)

    <tr>
      <th scope="row">@if ($user->profile && $user->profile->profile_picture)
         <img src="{{ Storage::url($user->profile->profile_picture) }}" alt="Profile Picture" style="width: 50px; border-radius: 25%;">    
          @endif
          {{ $user->name }}</th>
      <td>
</td>
      <td>{{ $user->roles->pluck('name')->implode(', ') }} 
@if ($user->roles->contains('name', 'testuser'))
<br>{{ $user->email }}
@endif

      </td>
      <td>
     
@if(Auth::user()->id == $user->id)
           you  
     @else

    
        @if(Auth::user()->isFriendWith($user))            
            <p>You are already friends!</p>            
        @elseif(Auth::user()->hasSentFriendRequestTo($user))            
            <p>Friend request sent. Waiting for approval.</p>      
       
        @elseif(Auth::user()->hasPendingFriendRequestFrom($user))
           <p>You have a pending friend request from this user.</p>   
 
        @else           
        {{Auth::user()->hasPendingFriendRequestFrom($user)}}

            <form action="{{ route('send-friend-request', ['friend' => $user]) }}" method="post">
                @csrf
                <button type="submit">Send Friend Request</button>
            </form>
        @endif

 @endif



     {{-- }}
       @foreach ($receivedRequests as $request)
            <li>{{ $request->name }} 
                @if ($request->pivot->user_id == $user->id)
                    <form action="{{ route('approve-friend-request', ['friend' => $request->id]) }}" method="post">
                        @csrf
                        <button type="submit">Approve</button>
                    </form>
                @endif
            </li>
        @endforeach
--}}


      </td>
    </tr>
    
@endforeach
  </tbody>
 </table>
{{ $users->links() }}
{{--
        <ul>
            @foreach($users as $user)
                <li>{{ $user->name }} 
 @if(Auth::user()->isFriendWith($user))            
            <p>You are already friends!</p>            
        @elseif(Auth::user()->hasSentFriendRequestTo($user))            
            <p>Friend request sent. Waiting for approval.</p>            
        @else            
            <form action="{{ route('send-friend-request', ['friend' => $user]) }}" method="post">
                @csrf
                <button type="submit">Send Friend Request</button>
            </form>
        @endif
                </li>
            @endforeach
        </ul>
--}}
{{--$user--}}
    </div>
@endsection
