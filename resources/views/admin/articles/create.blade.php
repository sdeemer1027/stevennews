
@extends('layouts.app')
@section('content')

    <div id="app">
      <div class="content">
       <div class="row">
        <div class="col-md-2">
           @include('admin.sidenav')
        </div>
        <div class="col-md-10">
        
           <form action="{{ route('admin.articles.store') }}" method="POST">
        @csrf

             <div class="card" style="width:98%">
               <div class="card-header" style="background-color: #0056b3; color: #ffffff;">
                  <h1>Create New Article  <button type="submit"  class="btn btn-warning" style="float: right;">Save Article</button></h1>  
                </div>
                <div class="card-body">

    <h1></h1>
    
        <label for="title">Title:</label>
        <input type="text" id="title" name="title"  class="form-control">
        
        <BR>
         <label for="title">Keywords:</label>
        <input type="text" id="keywords" name="keywords"  class="form-control">
        
        <BR>
         <label for="title">Meta Description:</label>
        <input type="text" id="metadescription" name="metadescription"  class="form-control">
        
        <BR>
        <label for="title">Category:</label>        
        <select id="category" name="category"  class="form-select">
            @foreach($categories as $category)
            <option value="{{$category->name}}">{{$category->name}}</option>      
            @endforeach
        </select>
        <BR>



        <label for="content">Content:</label>
        <textarea id="content" name="content" class="form-control"  rows="10"></textarea>
       
    </form>


{{--$categories--}}

</div>
</div>

        </div>
       </div>
      </div>
    </div>
@endsection












