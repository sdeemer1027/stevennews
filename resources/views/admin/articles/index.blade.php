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
                  <h1>All Articles <a href="{{ route('admin.articles.create') }}" class="btn btn-warning" style="float: right;">Add New Article</a></h1>  
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
      <td>  <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST">
            <a href="{{ route('admin.articles.show', $article->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
            <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>                    
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this article?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
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
