

@extends('layouts.app')
@section('content')
    <div id="app">
      <div class="content">
       <div class="row">
        <div class="col-md-2">
           @include('articles.sidenav')
        </div>
        <div class="col-md-10">
        
           

<div class="card" style="width:98%">
               <div class="card-header" style="background-color: #0056b3; color: #ffffff;">
                  <h1>{{ $article->title }} [{{ $article->category }}]</h1>  
                </div>
                <div class="card-body">

    <p>{!! $article->content !!}</p>
    
   


</div>
</div>


              
        </div>
       </div>
      </div>
    </div>

@endsection












