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
                  <h1>All Articles</h1>  
                </div>
                <div class="card-body">
                       <table class="table table-dark table-hover">
                       
 <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Created</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>    
     @foreach ($articles as $article)
            <tr>
      <td><a href="{{ route('admin.articles.show', $article->id) }}">{{ $article->title }}</a></td>
      <td>{{ $article->category }}</td>
      <td>{{ $article->created_at }}</td>
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
