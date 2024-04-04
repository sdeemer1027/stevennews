
@extends('layouts.app')
@section('content')
    <div id="app">
      <div class="content">
       <div class="row">
        <div class="col-md-2">
           @include('admin.sidenav')
        </div>
        <div class="col-md-10">
        
           
           <form action="{{ route('admin.articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

<div class="card" style="width:98%">
               <div class="card-header" style="background-color: #0056b3; color: #ffffff;">
                  <h1>Edit Article  <button type="submit"  class="btn btn-warning" style="float: right;">Update Article</button> </h1>  
                </div>
                <div class="card-body">

  
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $article->title }}"   class="form-control">

 <label for="title">Keywords:</label>
        <input type="text" id="keywords" name="keywords"  value="{{ $article->keywords }}"  class="form-control">
        
        <BR>
         <label for="title">Meta Description:</label>
        <input type="text" id="metadescription" name="metadescription"  value="{{ $article->metadescription }}"  class="form-control">
        


          <label for="title">Category:</label>        
        <select id="category" name="category"  class="form-select">
            @foreach($categories as $category)
            <option value="{{$category->name}}"  @if( $category->name == $article->category ) selected="selected" @endif >{{$category->name}}</option>      

             @endforeach
        </select>

        <label for="content">Content:</label>
        <textarea id="content" name="content"  class="form-control">{{ $article->content }}</textarea>



</div>
</div>




  
    
        
    </form>


              
        </div>
       </div>
      </div>
    </div>

@endsection












