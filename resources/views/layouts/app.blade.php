<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

<style>

</style>

</head>
<body  data-bs-theme="dark" class="d-flex flex-column h-100">
    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm  sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"> <img src="/srdlogo.png" height="50px;">
                  <span style="color:#e97855;">S</span>teven.<span style="color:#e97855;">News</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ __('About') }}</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('aboutsteve')}}">About Steve</a>
                                    <a class="dropdown-item" href="#">About Site</a>
                                    <a class="dropdown-item" href="#">About Evets.Pet</a>
                                </div>
                            </li>
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ __('Services') }}</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Database</a>
                                    <a class="dropdown-item" href="#">PHP</a>
                                    <a class="dropdown-item" href="#">Laravel</a>
                                </div>
                            </li>



                        <a class="nav-link" href="{{ route('articles') }}">{{ __('Articles') }}</a>

                        <a class="nav-link" href="#">{{ __('Contact') }}</a>
                        
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (auth()->user()->hasRole('admin'))  
                                     <a class="dropdown-item" href="{{ route('admin.home') }}">Admin</a>
                                    @endif 
                                    <a class="dropdown-item" href="{{ route('dashboard.index') }}">Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

            </div>
        </nav>
 
        
   
        <main class="py-4">
            @yield('content')
        </main>
  <BR><BR>

<footer class="footer fixed-bottom mt-auto py-3 bg-dark">
  <div class="container">
    <div class="row align-items-start">
      <div class="col-md-6 d-flex align-items-center">
    <p class="text-muted mb-0">© 2024 <span style="color:#e97855;">S</span>teven.<span style="color:#e97855;">News</span></p>
</div>
      <div class="col-md-6 text-md-end">
        <ul class="nav justify-content-end">
         <li class="nav-item"><a href="https://www.facebook.com/drsteve2020" class="nav-link px-2 text-muted" target="_blank"><i class="bi bi-facebook"></i></a></li>
            <li class="nav-item"><a href="https://www.instagram.com/sd1964.with/" class="nav-link px-2 text-muted" target="_blank"><i class="bi bi-instagram"></i></a></li>
            <li class="nav-item"><a href="https://www.linkedin.com/in/steven-deemer/" class="nav-link px-2 text-muted" target="_blank"><i class="bi bi-linkedin"></i></a></li>
      
        </ul>
      </div>
    </div>
  </div>
</footer>



    </div>

</body>
</html>
