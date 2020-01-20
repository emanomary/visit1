<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'برنامج الزيارات - مديرية الوسطى') }}</title>
    <link href="{{ asset('img/favicon.png') }}" rel="Shortcut Icon" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/rtl/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visit.css') }}">   

</head>
<body style="font-family: Cairo, sans-serif;">
    <div id="app">
      <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
         <div class="float-center">-->
                
                <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{-- __('Toggle navigation') --}}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    Left Side Of Navbar
                    <ul class="navbar-nav ml-auto">

                    </ul>
                    @auth
                    Right Side Of Navbar 
                    <ul class="navbar-nav mr-auto">
                       Authentication Links
                     @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{-- route('login') --}}">{{-- __('Login') --}}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{-- route('register') }}">{{-- __('Register') --}}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{-- Auth::user()->name --}} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{-- route('logout') --}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{-- __('Logout') --}}
                                    </a>

                                    <form id="logout-form" action="{{-- route('logout') --}}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                    @endauth
                </div>
            </div>
      </nav>-->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
</body>
</html>
