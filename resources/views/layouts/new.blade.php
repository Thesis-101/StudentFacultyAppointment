<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="_method" content="PUT">

  <title>SFA System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">

  <link rel="icon" type="image/x-icon" href="{{asset('storage/images/school-bg.png')}}">

  @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/notifications.js', 'resources/js/load-departments.js'])

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('storage/images/school-bg.png')}}" alt="SchoolLogo" height="200" width="200">
     </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="text-white nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item ">
        <a class="nav-link"  href="#">
          <i class="text-white far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link"  href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
          <i class="text-white far fa fa-power-off"></i>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="text-white fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center bg-info">
      <span class="brand-text font-weight-bold">SFA System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar px-0">
      <!-- Sidebar user panel (optional) -->
      <div style="box-shadow: 2px 2px 5px black;" class="user-panel py-3 d-flex align-items-center school-hero">
        @guest
            @else
            @php($profile_pic = Auth::user()->profile_img)
        <div class="image ">
          <img style="width: 60px; height: 60px; outline: #ffc107 solid 7px !important; border: #17a2b8 solid 2px !important; box-shadow: 2px 2px 5px black;" id="side-pic" src="@if($profile_pic == null ) {{asset('storage/images/default-avatar.jpg')}} @else {{asset('storage/'.$profile_pic)}} @endif" class=" elevation-2 bg-white" alt="User Image">
        </div>
        <div style="border-top: #ffc107 solid 3px !important; border-bottom: #ffc107 solid 3px !important; background: rgba(23, 162, 184, 0.7)" class="info w-100">
            <a style="" href="{{ url('Auth::user()->user_type/profile') }}" class="d-block text-white text-bold">{{ Auth::user()->name }}</span></a>
            <hr class="m-0 bg-warning" style="color: white;">
            <small class="text-white"><i>{{Auth::user()->user_type}}</i></small>
        </div>
        @endguest
      </div>


      <!-- Sidebar Menu -->
      <p class="bg-info text-center"><i>MAIN NAVIGATION</i></p>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        @guest
          @else
          <li class="nav-item m-auto">
            <a href="{{ url(Auth::user()->user_type) }}" class="nav-link">
              <i class="text-warning nav-icon fas fa fa-chart-line"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        @endguest

        @guest
          @if (Route::has('login'))
          <li class="nav-item m-auto">
            <a href="{{ route('login') }}" class="nav-link">
              <p>
                Login
              </p>
            </a>
          </li>
          @endif

          @if (Route::has('register'))
          <li class="nav-item m-auto">
            <a href="{{ route('register') }}" class="nav-link">
              <p>
                Register
              </p>
            </a>
          </li>
          @endif

        @else
          @if (Auth::user()->user_type == 'faculty')  
          <li class="nav-item m-auto">
            <a href="{{ url('faculty/appointments') }}" class="nav-link">
              <i class="text-warning nav-icon fas fa fa-list"></i>
              <p>
                Appoinment List
              </p>
            </a>
          </li>

          <li class="nav-item m-auto">
            <a href="{{ url('faculty/report') }}" class="nav-link">
              <i class="text-warning nav-icon fas fa fa-paperclip"></i>
              <p>
                Generate Report
              </p>
            </a>
          </li>
          <li class="nav-item m-auto">
            <a href="{{ url('faculty/profile') }}" class="nav-link">
              <i class="text-warning nav-icon fas fa fa-user"></i>
              <p>
                Account Settings
              </p>
            </a>
          </li>
          <li class="nav-item m-auto">
            <a href="{{ url('notification') }}" class="nav-link">
              <i class="text-warning nav-icon far fa fa-bell"></i>
              <p>
                Notification
                <span class="badge bg-warning"></span>
              </p>
            </a>
          </li>
          @elseif (Auth::user()->user_type == 'student')
          <li class="nav-item m-auto">
            <a href="{{ url('student/faculty-list') }}" class="nav-link">
              <i class="text-warning nav-icon fas fa fa-book"></i>
              <p>
                Book an Appointment
              </p>
            </a>
          </li>
          <li class="nav-item m-auto">
            <a href="{{ url('student/request-list') }}" class="nav-link">
              <i class="text-warning nav-icon fas fa fa-list"></i>
              <p>
                Appointment List
              </p>
            </a>
          </li>
          <li class="nav-item m-auto">
            <a href="{{ url('student/profile') }}" class="nav-link">
              <i class="text-warning nav-icon fas fa fa-user"></i>
              <p>
                Account Settings
              </p>
            </a>
          </li>
          <li class="nav-item m-auto">
            <a id="notification" href="{{ url('notification') }}" class="nav-link">
              <i class="text-warning nav-icon fas fa fa-bell"></i>
              <p class="">
                Notification
                <span class="badge bg-warning"></span>
              </p>
            </a>
          </li>
          @elseif (Auth::user()->user_type == 'admin')
          <li class="nav-item m-auto">
            <a href="{{ url('admin/faculty-list') }}" class="nav-link">
              <i class="text-warning nav-icon fas fa fa-list"></i>
              <p>
                Users List
              </p>
            </a>
          </li>
          <li class="nav-item m-auto">
            <a href="{{ url('admin/department-setup') }}" class="nav-link">
              <i class="text-warning nav-icon fas fa fa-landmark"></i>
              <p>
                Department Setup
              </p>
            </a>
          </li>
          <li class="nav-item m-auto">
            <a href="{{ url('admin/reports') }}" class="nav-link">
              <i class="text-warning nav-icon fas fa-paperclip"></i>
              <p>
                Generate Report
              </p>
            </a>
          </li>
          <li class="nav-item m-auto">
            <a href="{{ url('admin/profile') }}" class="nav-link">
              <i class="text-warning nav-icon fas fa fa-user"></i>
              <p>
                Account Settings
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item m-auto">
            <a href="{{ route('logout') }}" class="nav-link" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <i class="text-warning nav-icon fas fa fa-power-off"></i>
              <p>
                Logout
              </p>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </a>
          </li>
        @endguest
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Student-Faculty Appointment System
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
