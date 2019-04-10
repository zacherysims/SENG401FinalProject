<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'SpaceBook') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>

  .title {
    color: #292b2d;
    font-size: 84px;
    text-align: center;
    margin-bottom: 30px;
    text-shadow: 0px 0px 10px white;
    animation: mymove 25s infinite;

  }

  @keyframes mymove {
    0% {text-shadow: 0px 0px 10px white;}
    10% {text-shadow: 0px 0px 30px #FF4AED;}
    20% {text-shadow: 0px 0px 10px white;}
    30% {text-shadow: 0px 0px 30px #39D9F9;}
    40% {text-shadow: 0px 0px 10px white;}
    50% {text-shadow: 0px 0px 30px #F9D139;}
    60% {text-shadow: 0px 0px 10px white;}
    70% {text-shadow: 0px 0px 30px #6439F9;}
    80% {text-shadow: 0px 0px 10px white;}
    90% {text-shadow: 0px 0px 30px #68FF7B;}
  }

  .page_heading{
    color: #292b2d;
    font-weight: bold;
    text-align: center;
    margin-top: auto;
    margin-bottom: auto;
    text-shadow: 0px 0px 10px white;

  }

  .div_element {
    background-color: #292b2d;
    opacity: 0.9;
    color: lightgray;
    margin-top: 20px;
    margin-bottom: 20px;
    margin-left: auto;
    margin-right: auto;
    overflow: auto;
    padding: 10px;
    border-radius: 10px;
  }


  .fullscreen {
    min-height: 100vh;
    height: 100%;
    padding: 0px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
  }
  .dropbtn {
    background-color: #292b2d;
    color: lightgray;
    opacity: 0.8;
    border: none;
    margin-top: 13%;
    border-radius: 10%;
  }

  .dropdown {
    position: relative;
    display: inline-block;
    background-position: center;

  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #292b2d;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: lightgray;
    opacity: 0.8;
    padding: 12px 16px;
    text-decoration: none;
    display: block;

  }

  .dropdown-content a:hover {opacity: 1;}

  .dropdown:hover .dropdown-content {display: block;}

  .dropdown:hover .dropbtn {opacity: 1;}


  @yield('styles')
  </style>

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
  @yield('scripts')
  </script>

</head>
<body>
  <div id="app" style="margin: 0px; padding: 0px;">
    <nav style ="background-color: #292b2d ; "class="navbar navbar-expand-md navbar-dark navbar-laravel">
      <div class="container" >
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'SpaceBook') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

            <!--<li class = "nav-item"><a class= "nav-link" href="/news">News</a></li>-->
            <div class="dropdown">
              <button class="dropbtn">News</button>
              <div class="dropdown-content">
                <a href="/news">Hubble News</a>
                <a href="/news1">James Webb News</a>

              </div>
            </div>
            <li class = "nav-item"><a class= "nav-link" href="/forum">Forum</a></li>
            <li class = "nav-item"><a class= "nav-link" href="/search">Search</a></li>
            <li class = "nav-item"><a class= "nav-link" href="/picoftheday">Picture of the Day</a></li>

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4" style=" margin: 0 !important; padding: 0 !important;">
    <div class="fullscreen" style="background-image: url(/nebula.jpg); background-size: cover; padding: 5%;">
      @yield('content')
    </div>
  </main>
</div>
</body>
</html>
