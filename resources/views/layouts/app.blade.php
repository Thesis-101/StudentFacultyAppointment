<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_method" content="PUT">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/notifications.js'])

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-xl navbar-dark bg-secondary" aria-label="Sixth navbar example">
            <div class="container-fluid">
            <a class="navbar-brand" href="/">Student Appointment System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample06">
                <ul class="navbar-nav mb-2 mb-xl-0" style="margin-left: auto">
                    <li class="nav-item ">
                        <a class="nav-link active " href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                        </form>
                    </li>
                </ul>
            </div>
            </div>
        </nav>

        <main>
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 220px; height: 100vh">
                <p class="fs-4 d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">{{ Auth::user()->name }}</p>
                <hr>

                <ul class="nav nav-pills flex-column mb-auto">
                @guest
                        @else
                            <li class="nav-item">
                                @if (Auth::user()->user_type == 'faculty')
                                    <a href="{{ url('faculty') }}" class="nav-link">
                                        Dashboard
                                    </a>
                                @endif

                                @if (Auth::user()->user_type == 'student')
                                    <a href="{{ url('/') }}" class="nav-link">
                                        Dashboard
                                    </a>
                                @endif

                                @if (Auth::user()->user_type == 'admin')
                                    <a href="{{ url('admin') }}" class="nav-link">
                                        Dashboard
                                    </a>
                                @endif
                            </li>
                            <!-- <li class="nav-item">
                                <a href="#" class="nav-link">About Us</a>
                            </li> -->
                        @endguest
                        
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
                            @if (Auth::user()->user_type == 'faculty')
                                <li class="nav-item">
                                    <a href="#" class="nav-link">List of Students</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('faculty/appointments') }}" class="nav-link">Appointment List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Generate Report</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link position-relative" href="{{ url('faculty/profile') }}">Account Settings </a>
                                </li>
                            @elseif (Auth::user()->user_type == 'student')
                                <li class="nav-item">
                                    <a href="{{ url('student/faculty-list') }}" class="nav-link">List of Faculty</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('student/request-list') }}" class="nav-link">Appointment List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link position-relative" href="{{ url('student/profile') }}">Account Settings </a>
                                </li>
                            @elseif (Auth::user()->user_type == 'admin')
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Faculty List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Student List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Department Setup</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Generate Report</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Account Settings</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a id="notification" href="{{ url('notification') }}" class="nav-link position-relative">
                                    Notification <span class="badge text-bg-secondary"></span>
                                </a>
                            </li>


                            <li class="nav-item ">
                                <a class="nav-link " href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                    @endguest
                </ul>
                <hr>    
            </div>

            @yield('content')
            
        </main>
    </div>

</body>
</html>
