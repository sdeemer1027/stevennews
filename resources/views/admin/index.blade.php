@extends('layouts.app')

@section('content')
    <div id="app">
 @include('admin.sidenav')
        <div class="content">
            <!-- Content area -->
            @yield('content')
        </div>
    </div>
@endsection
