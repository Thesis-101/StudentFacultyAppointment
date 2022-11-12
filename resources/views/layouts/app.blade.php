<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_method" content="PUT">

    <title>SFA System</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/styles.scss','resources/sass/app.scss', 'resources/js/app.js', 'resources/js/notifications.js', 'resources/js/load-departments.js'])
    <script src="https://kit.fontawesome.com/b037b0da2a.js" crossorigin="anonymous"></script>

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
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="transaction" viewBox="0 0 448 512">
            <path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32 32V448H416V384h32V0H416 384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-256H352v32H128V128zm224 64v32H128V192H352z"/>
        </symbol>
        <symbol id="dashboard" viewBox="0 0 512 512">
            <path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/>
        </symbol>
        <symbol id="list-faculty" viewBox="0 0 512 512">
            <path d="M64 144c26.5 0 48-21.5 48-48s-21.5-48-48-48S16 69.5 16 96s21.5 48 48 48zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM64 464c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm48-208c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48z"/>
        </symbol>
        <symbol id="list-appointment" viewBox="0 0 512 512">
            <path d="M374.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 402.7 86.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z"/>
        </symbol>
        <symbol id="account-settings" viewBox="0 0 512 512">
            <path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336c44.2 0 80-35.8 80-80s-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80z"/>
        </symbol>
        <symbol id="notify" viewBox="0 0 448 512">
            <path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/>
        </symbol>
        <symbol id="top-out" viewBox="0 0 512 512">
            <path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/>
        </symbol>
        <symbol id="side-out" viewBox="0 0 512 512">
            <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V256c0 17.7 14.3 32 32 32s32-14.3 32-32V32zM143.5 120.6c13.6-11.3 15.4-31.5 4.1-45.1s-31.5-15.4-45.1-4.1C49.7 115.4 16 181.8 16 256c0 132.5 107.5 240 240 240s240-107.5 240-240c0-74.2-33.8-140.6-86.6-184.6c-13.6-11.3-33.8-9.4-45.1 4.1s-9.4 33.8 4.1 45.1c38.9 32.3 63.5 81 63.5 135.4c0 97.2-78.8 176-176 176s-176-78.8-176-176c0-54.4 24.7-103.1 63.5-135.4z"/>
        </symbol>
        <symbol id="report" viewBox="0 0 512 512">
            <path d="M396.2 83.8c-24.4-24.4-64-24.4-88.4 0l-184 184c-42.1 42.1-42.1 110.3 0 152.4s110.3 42.1 152.4 0l152-152c10.9-10.9 28.7-10.9 39.6 0s10.9 28.7 0 39.6l-152 152c-64 64-167.6 64-231.6 0s-64-167.6 0-231.6l184-184c46.3-46.3 121.3-46.3 167.6 0s46.3 121.3 0 167.6l-176 176c-28.6 28.6-75 28.6-103.6 0s-28.6-75 0-103.6l144-144c10.9-10.9 28.7-10.9 39.6 0s10.9 28.7 0 39.6l-144 144c-6.7 6.7-6.7 17.7 0 24.4s17.7 6.7 24.4 0l176-176c24.4-24.4 24.4-64 0-88.4z"/>
        </symbol>
        <symbol id="department-setup" viewBox="0 0 512 512">
            <path d="M0 416c0-17.7 14.3-32 32-32l54.7 0c12.3-28.3 40.5-48 73.3-48s61 19.7 73.3 48L480 384c17.7 0 32 14.3 32 32s-14.3 32-32 32l-246.7 0c-12.3 28.3-40.5 48-73.3 48s-61-19.7-73.3-48L32 448c-17.7 0-32-14.3-32-32zm192 0c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zM384 256c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zm-32-80c32.8 0 61 19.7 73.3 48l54.7 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-54.7 0c-12.3 28.3-40.5 48-73.3 48s-61-19.7-73.3-48L32 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l246.7 0c12.3-28.3 40.5-48 73.3-48zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32s-14.3-32-32-32zm73.3 0L480 64c17.7 0 32 14.3 32 32s-14.3 32-32 32l-214.7 0c-12.3 28.3-40.5 48-73.3 48s-61-19.7-73.3-48L32 128C14.3 128 0 113.7 0 96S14.3 64 32 64l86.7 0C131 35.7 159.2 16 192 16s61 19.7 73.3 48z"/>
        </symbol>
        <symbol id="searchBTN" viewBox="0 0 512 512">
            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/>
        </symbol>
        <symbol id="time" viewBox="0 0 640 512">
            <path d="M224 256c-70.7 0-128-57.3-128-128S153.3 0 224 0s128 57.3 128 128s-57.3 128-128 128zm-45.7 48h91.4c20.6 0 40.4 3.5 58.8 9.9C323 331 320 349.1 320 368c0 59.5 29.5 112.1 74.8 144H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM640 368c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM496 288c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H512V304c0-8.8-7.2-16-16-16z"/>
        </symbol>
        <symbol id="department" viewBox="0 0 512 512">
            <path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160v8c0 13.3 10.7 24 24 24H456c13.3 0 24-10.7 24-24v-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8.1-3.4-17.2-3.4-25.2 0zM128 224H64V420.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512H480c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1V224H384V416H344V224H280V416H232V224H168V416H128V224zm128-96c-17.7 0-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32s-14.3 32-32 32z"/>
        </symbol>
        <symbol id="description-pointer" viewBox="0 0 256 512">
            <path d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z"/>
        </symbol>
    </svg>

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
                            <svg class="bi me-2 my-auto" style="color:white"  width="20px" height="20px"><use xlink:href="#top-out"/></svg>
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

        <main class="bg-light" style="height: 100vh !important;">
            <div class="d-flex flex-column flex-shrink-0 text-white bg-white shadow-lg" style="width: 220px; ">
                <div class="text-center mt-4">
                    @guest
                        @else
                        @php($profile_pic = Auth::user()->profile_img)
                    
                    <img id="side-pic" width="80px" height="80px" class="border-rounded" src="@if($profile_pic == null ) {{asset('storage/images/default-avatar.jpg')}} @else {{asset('storage/'.$profile_pic)}} @endif" alt="Profile Pic">
                    <p id="userName" class="fs-5 mb-3 text-dark text-decoration-none ">{{ Auth::user()->name }}</p>
                    @endguest
                </div>
                <h5 class="text-white text-center bg-secondary py-1"><i>Main Menu</i></h5>

                <ul class="nav nav-pills flex-column mb-auto">
                @guest
                        @else
                            <li class="nav-item">
                                @if (Auth::user()->user_type == 'faculty')
                                    <a  href="{{ url('faculty') }}" class="nav-link text-dark">
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#dashboard"/></svg>
                                        Dashboard
                                    </a>
                                @endif

                                @if (Auth::user()->user_type == 'student')
                                    <a href="{{ url('student') }}" class="nav-link text-dark">
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#dashboard"/></svg>
                                        Dashboard
                                    </a>
                                @endif

                                @if (Auth::user()->user_type == 'admin')
                                    <a href="{{ url('admin') }}" class="nav-link text-dark">
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#dashboard"/></svg>
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
                                <li class="nav-item ">
                                    <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item text-dark">
                                    <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->user_type == 'faculty')
                                <li class="nav-item text-dark">
                                    <a href="{{ url('faculty/appointments') }}" class="nav-link text-dark">
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#list-appointment"/></svg>
                                        Appointment List
                                    </a>
                                </li>
                                <li class="nav-item text-dark">
                                    <a href="{{ url('faculty/report') }}" class="nav-link text-dark">
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#report"/></svg>
                                        Generate Report
                                    </a>
                                </li>
                                <li class="nav-item text-dark">
                                    <a class="nav-link position-relative text-dark" href="{{ url('faculty/profile') }}">
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#account-settings"/></svg>
                                        Account Settings
                                    </a>
                                </li>
                                <li class="nav-item text-dark">
                                    <a id="notification" href="{{ url('notification') }}" class="nav-link position-relative text-dark">
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#notify"/></svg>
                                        Notification <span class="badge text-bg-secondary"></span>
                                    </a>
                                </li>
                            @elseif (Auth::user()->user_type == 'student')
                                <li class="nav-item text-dark">
                                    <a href="{{ url('student/faculty-list') }}" class="nav-link text-dark">
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#list-faculty"/></svg>
                                        Book an Appointment
                                    </a>
                                </li>
                                <li class="nav-item text-dark">
                                    <a href="{{ url('student/request-list') }}" class="nav-link text-dark">
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#list-appointment"/></svg>
                                        Appointment List
                                    </a>
                                </li>
                                <li class="nav-item text-dark">
                                    <a class="nav-link position-relative text-dark" href="{{ url('student/profile') }}">
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#account-settings"/></svg>
                                        Account Settings
                                    </a>
                                </li>
                                <li class="nav-item text-dark">
                                    <a id="notification" href="{{ url('notification') }}" class="nav-link position-relative text-dark">
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#notify"/></svg>
                                        Notification <span class="badge text-bg-secondary"></span>
                                    </a>
                                </li>
                            @elseif (Auth::user()->user_type == 'admin')
                                <!-- <li class="nav-item accordion accordion-flush" id="accordionExample">
                                    <div class="accordion-item border-0">
                                        <a href="#" class="nav-link accordion-button py-2 bg-dark text-primary px-3 border-0 rounded-0 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            <svg class="bi me-2 " style="color:white"  width="15px" height="15px"><use xlink:href="#list-faculty"/></svg>
                                            Users List
                                        </a>
                                        <div id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample" class="accordion-collapse collapse">
                                            <div class="accordion-body bg-secondary">
                                                <a href="{{ url('admin/faculty-list') }}" class="nav-link text-white py-2">Faculty List</a>
                                                <hr class="my-0">
                                                <a href="{{ url('admin/student-list') }}" class="nav-link text-white">Student List</a>
                                            </div>
                                        </div>
                                    </div>
                                </li> -->
                                <li class="nav-item text-dark">
                                    <a href="{{ url('admin/faculty-list') }}"  class="nav-link text-dark">
                                    <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#list-faculty"/></svg>
                                        Users List
                                    </a>
                                </li>
                                <li class="nav-item text-dark">
                                    <a href="{{ url('admin/department-setup') }}" class="nav-link text-dark" >
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#department-setup"/></svg>
                                        Department Setup
                                    </a>
                                </li>
                                <li class="nav-item text-dark">
                                    <a href="{{ url('admin/reports') }}" class="nav-link text-dark">
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#report"/></svg>
                                        Generate Report
                                    </a>
                                </li>
                                <li class="nav-item text-dark">
                                    <a href="{{ url('admin/profile') }}" class="nav-link text-dark">
                                        <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#account-settings"/></svg>
                                        Account Settings
                                    </a>
                                </li>
                            @endif
                            


                            <li class="nav-item ">
                                <a class="nav-link text-dark" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <svg class="bi me-2 " style="color:black"  width="15px" height="15px"><use xlink:href="#side-out"/></svg>
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
