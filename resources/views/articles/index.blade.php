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
    
<th  scope="col" data-sort="title" class="{{ request()->get('sort_by') == 'title' ? request()->get('sort_order') : '' }}">    
    @if(request()->get('sort_by') == 'title' && request()->get('sort_order') == 'asc')
        <i class="fas fa-chevron-up"></i>
    @elseif(request()->get('sort_by') == 'title' && request()->get('sort_order') == 'desc')
        <i class="fas fa-chevron-down"></i>
    @endif
    Title
</th>

<th  scope="col" data-sort="category" class="{{ request()->get('sort_by') == 'category' ? request()->get('sort_order') : '' }}">    
    @if(request()->get('sort_by') == 'category' && request()->get('sort_order') == 'asc')
        <i class="fas fa-chevron-up"></i>
    @elseif(request()->get('sort_by') == 'category' && request()->get('sort_order') == 'desc')
        <i class="fas fa-chevron-down"></i>
    @endif
    Category
</th>

<th  scope="col" data-sort="created_at" class="{{ request()->get('sort_by') == 'created_at' ? request()->get('sort_order') : '' }}">    
    @if(request()->get('sort_by') == 'created_at' && request()->get('sort_order') == 'asc')
        <i class="fas fa-chevron-up"></i>
    @elseif(request()->get('sort_by') == 'created_at' && request()->get('sort_order') == 'desc')
        <i class="fas fa-chevron-down"></i>
        @elseif(request()->get('sort_by') == 'title')
        @elseif(request()->get('sort_by') == 'category')
        @else
           <i class="fas fa-chevron-down"></i>
    @endif
    Created
</th>
   
    </tr>
  </thead>
  <tbody>    
     @foreach ($articles as $article)
            <tr>
      <td>{{--<a href="{{ route('articles.show', $article->id) }}">{{ $article->title }} </a>--}}
<a href="{{ route('article.show', $article->slug) }}">{{ $article->title }}</a>

      </td>
      <td>{{ $article->category }}</td>
      <td>{{ $article->created_at->format('F d, Y') }}</td>
   
    </tr>
        @endforeach
  </tbody>
                       </table>


{{ $articles->links() }}

                </div>
             </div>



        </div>
       </div>
      </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('th[data-sort]').on('click', function() {

            const column = $(this).data('sort');
            let direction = 'asc';

            if ($(this).hasClass('asc')) {
                direction = 'desc';
                $(this).removeClass('asc').addClass('desc');
            } else {
                $(this).removeClass('desc').addClass('asc');
            }

            // Remove sorting classes from other headers
            $('th[data-sort]').not(this).removeClass('asc desc');

            // Construct the sorting URL dynamically
            const currentUrl = new URL('{{ route('articles') }}');
            currentUrl.searchParams.set('sort_by', column);
            currentUrl.searchParams.set('sort_order', direction);
            
            // Redirect to the dynamically constructed URL
            window.location.href = currentUrl.toString();
        });
    });
</script>
@endsection
