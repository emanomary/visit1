<!doctype html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'برنامج الزيارات - مديرية الوسطى') }}</title>
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('img/favicon.png') }}" rel="Shortcut Icon" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/rtl/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visit.css') }}">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
  </head>
  <body style="font-family: Cairo, sans-serif;">
    <nav class="navbar navbar-dark fixed-top bg-primary flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img src="{{ asset('img/logo.png') }}" width="30px" height="30px" class="ml-1 mr-1" style="background: #fff;">برنامج الزيارات</a>
    <!-- search -->
    <form method="GET" action="{{ route('results.search') }}" class="col-8" >
      @csrf
       <input class="form-control form-control col-8" type="text" aria-label="Search" name="search" placeholder="ابحث عن اسم المدرسة أو الزائر" style="border-radius: 3px;">
    </form>


      <ul class="navbar-nav px-3">
        @auth
        <li class="nav-item">
          <a class="nav-link" href="#" style="color: #fff;">
           اهلا وسهلا {{ Auth::user()->name }}
          </a>
        </li>
        <!-- end search form -->
         @endauth         
      </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          @auth
          
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('home') }}">
              <i class="fas fa-home"></i>
              الرئيسية 
            </a>
          </li>
          @if(auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('admin'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
              <i class="fas fa-user mr-1"></i>
              المستخدمون
            </a>
          </li>
          @endif

          @if(auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('admin'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('visitors.index') }}">
              <i class="fas fa-user mr-1"></i>
              الزوار
            </a>
          </li>
          @endif

          @if(auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('admin') || auth()->user()->hasRole('user'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('visits.index') }}">
              <img src="{{ asset('img/meeting.png') }}" class="mr-1">
              الزيارات
            </a>
          </li>
          @endif

          <li class="nav-item">
            <a class="nav-link" href="{{ url('logout') }}">
              <i class="fas fa-door-open mr-1"></i>
              تسجيل الخروج
            </a>
          </li>
          @endauth
        </ul>
      </div>
    </nav>
       
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          @yield('content')
        </main>
      </div>
    </div>

    
   <!-- <script type="text/javascript" src="{{-- asset('js/visit.js') --}}"></script>-->
    
     
  </body>
</html>
