@extends('layouts.app')

@section('content')
    <div id="app">
    <div class="row">
    

 <div class="col-2">
 @include('admin.sidenav')
 </div>
 <div class="col-10">
        <div class="content">
            <!-- Content area -->
            {{ $countroles->count() }}




<table class="table table-dark table-hover" id="articlesTable">
    <thead>
        <tr>
            <th scope="col">email</th>
            <th scope="col">Email</th>
            <th scope="col" colspan="{{ $countroles->count() }}">roles</th>                                 
        </tr>
    </thead>
    <tbody>   
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                @foreach($countroles as $countrole)
                    <td>
                        @php
                            $roleExists = false;
                            $userRole = null;
                        @endphp
                        @foreach($user->roles as $role)
                            @if($role->name == $countrole->name)
                                @php
                                    $roleExists = true;
                                    $userRole = $role;
                                @endphp
                                
                                @break
                            @endif
                        @endforeach
                        @if(!$roleExists)
                            <form action="{{ route('addRole', ['userId' => $user->id, 'roleId' => $countrole->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">{{ $countrole->name }}</button>
                            </form>
                        @else
                            <form action="{{ route('revokeRole', ['userId' => $user->id, 'roleId' => $userRole->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                              <span style="color: green">{{ $role->name }}</span>  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>



























<table class="table table-dark table-hover" id="articlesTable">
    <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col" colspan="{{ $countroles->count() }}">roles</th>                                 
        </tr>
    </thead>
    <tbody>   
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                @foreach($countroles as $countrole)
                    <td>
                        @php
                            $roleExists = false;
                        @endphp
                        @foreach($user->roles as $role)
                            @if($role->name == $countrole->name)
                                @php
                                    $roleExists = true;
                                @endphp
                                <span style="color: red">{{ $role->name }}</span>
                            @endif
                        @endforeach
                        @if(!$roleExists)
                            <form action="{{ route('addRole', ['userId' => $user->id, 'roleId' => $countrole->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">{{ $countrole->name }}</button>
                            </form>
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

           {{--$users--}}
        </div>
 </div>   



    </div>
    </div>
@endsection
