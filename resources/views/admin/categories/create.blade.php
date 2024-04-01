
@extends('layouts.app')
@section('content')

    <div id="app">
      <div class="content">
       <div class="row">
        <div class="col-md-2">
           @include('admin.sidenav')
        </div>
        <div class="col-md-10">
        
           <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

             <div class="card" style="width:98%">
               <div class="card-header" style="background-color: #0056b3; color: #ffffff;">
                  <h1>Create New Category  <button type="submit"  class="btn btn-warning" style="float: right;">Save Category</button></h1>  
                </div>
                <div class="card-body">

    <h1></h1>
    
        <label for="title">Name:</label>
        <input type="text" id="name" name="name"  class="form-control">
        <BR>
        
        <BR>

       
    </form>


{{--$categories--}}

</div>
</div>

        </div>
       </div>
      </div>
    </div>
@endsection












