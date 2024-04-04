@extends('layouts.app')

@section('content')
    <div id="app">
    <div class="row">
    

 <div class="col-2">
 @include('admin.sidenav')
 </div>
 <div class="col-10">
        <div class="content">
            <!-- Content area -->
            @yield('content')
        </div>
 </div>   



    </div>
    </div>
@endsection
