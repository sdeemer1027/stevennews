@extends('layouts.app')



@section('content')

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<style>
    /* Override DataTables styles */
    /* Set the background color of the entire table to white */
    table.dataTable {
        background-color: #000;
    }

    /* Set the text color inside the table to white */
    table.dataTable  td,
    table.dataTable  th {
        color: #fff;
    }
 
 .dataTables_wrapper .dataTables_filter  label {
    color: #fff; /* Text color (white) */
}
/* Override DataTables styles for the "Show" and "entries" labels */
.dataTables_wrapper .dataTables_length label {
    color: #fff; /* Text color (white) */
}
/* Override DataTables styles for the information text */
.dataTables_wrapper .dataTables_info {
    color: #fff; /* Text color (white) */
}

/* Override DataTables styles for pagination text */
.dataTables_wrapper .dataTables_paginate .paginate_button {
    color: #fff; /* Text color (white) */
}

/* Override DataTables styles for pagination text inside anchor tags */
.dataTables_wrapper .dataTables_paginate .paginate_button:not(.current) {
    color: #fff; /* Text color (white) */
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current) {
    color: #fff; /* Text color on hover (white) */
}




    /* Customize select dropdowns */
    /* Set the background color of select dropdowns to dark */
    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter select,
    .dataTables_wrapper .dataTables_info select,
    .dataTables_wrapper .dataTables_paginate select {
        background-color: #343a40; /* Dark background color */
        color: #fff; /* Text color */
    }
</style>
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
     
                       <table class="table table-dark table-hover" id="articlesTable">
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
<script>
    $(document).ready(function() {
        $('#articlesTable').DataTable();
    });
</script>

@endsection
