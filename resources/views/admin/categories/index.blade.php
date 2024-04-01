@extends('layouts.app')
@section('content')
    <div id="app">
      <div class="content">
       <div class="row">
        <div class="col-md-2">
           @include('admin.sidenav')
        </div>
        <div class="col-md-10">
        

             <div class="card" style="width:98%">
               <div class="card-header" style="background-color: #0056b3; color: #ffffff;">
                  <h1>Categories <a href="{{ route('admin.categories.create') }}" class="btn btn-warning" style="float: right;">Add New Category</a></h1>  
                </div>
                <div class="card-body">
                       <table class="table table-dark table-hover">
                       
 <thead>
    <tr>
     
      <th scope="col">Category</th>
      <th scope="col">Created</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>    
     @foreach ($categories as $category)
            <tr>
      <td>{{ $category->name }}</td>
      <td>{{ $category->created_at }}</td>
      <td>  
      </td>
    </tr>
        @endforeach
  </tbody>
                       </table>
                </div>
             </div>



        </div>
       </div>
      </div>
    </div>

@endsection
