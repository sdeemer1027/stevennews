

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
                  <h1>{{ $article->title }} [{{ $article->category }}]<a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning" style="float: right;">Edit</a> </h1>  
                </div>
                <div class="card-body">

    <p>{!! $article->content !!}</p>
    
    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this article?')" class="btn btn-danger" style="float: right;">Delete</button>
    </form>


</div>
</div>


              
        </div>
       </div>
      </div>
    </div>

@endsection












