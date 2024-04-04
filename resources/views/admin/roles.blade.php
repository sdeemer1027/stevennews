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
          
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createRoleModal">Create New Role</button>

<table class="table table-dark table-hover" id="articlesTable">
    <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col" >guard name</th>   
            <th scope="col" >Created</th>                                
        </tr>
    </thead>
    <tbody> 

@foreach($roles as $role)
<tr>
    <td>{{$role->name}}</td>
    <td>{{$role->guard_name}}</td>
    <td>{{$role->created_at}}</td>
</tr>
@endforeach
           </tbody>
</table>
         {{--$roles--}}
        </div>
 </div>   



    </div>
    </div>


      <!-- Create Role Modal -->
    <div class="modal fade" id="createRoleModal" tabindex="-1" role="dialog" aria-labelledby="createRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createRoleModalLabel">Create New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createRoleForm"  action="{{ route('roles.store') }}"  method="POST">
                         @csrf
                        <div class="form-group">
                            <!-- Form fields for creating a new role -->
    <input type="text" name="role_name" id="roleName" placeholder="Role Name">
  
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="addRoleBtn">Add Role</button>
                </div>
            </div>
        </div>
    </div>

  <script>
    $(document).ready(function() {
        $('#addRoleBtn').on('click', function() {
            var roleName = $('#roleName').val();
//alert(roleName);
            // Perform AJAX request to add role
            $.ajax({
                url: '{{ route('roles.store') }}',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'role_name': roleName,
                },
                success: function(data) {
                    // Handle success response
                    console.log(data); // Optional: Log response data
                    $('#createRoleModal').modal('hide');
                    // Optionally, you can reload the page or update the role list
                     window.location.reload(); // Reload the page
                    // $('#rolesTable').load(window.location.href + ' #rolesTable'); // Update role list
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText); // Optional: Log error message
                    alert('Error adding role. Please try again.');
                }
            });
        });
    });
</script>

@endsection