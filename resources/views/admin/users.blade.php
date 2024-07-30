@extends('layouts.app')

@section('content')


<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <div id="app">
    <div class="row">
    

 <div class="col-2">
 @include('admin.sidenav')
 </div>
 <div class="col-10">
        <div class="content">
            <!-- Content area -->
            {{-- $countroles->count() --}}




<table class="table table-dark table-hover" id="usersTable">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col" colspan="{{ $countroles->count() }}">Roles</th>                                 
        </tr>
    </thead>
    <tbody>   
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
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
                              {{ $countrole->name }}  <button type="submit" class="btn btn-primary"><i class="fas fa-plus-square"></i></button>
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


{{--$users->links--}}


           {{--$users--}}
        </div>
 </div>   



    </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#usersTable').DataTable();
    });
</script>

@endsection
