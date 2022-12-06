@extends('layouts.new')

@section('content')
@vite(['resources/js/faculty-list.js'])


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users List</h1>
            <span class=""></span>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="float-sm-right" style="list-style:none;">
              <li>All users including faculty and students are viewed here.</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Data Contents -->
        <div class="row">

        <!-- Modal -->
        @foreach($userList as $user)
        <form action="/updateProfile" id="profile_setup_frm" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="personalDetails{{$user['id']}}" tabindex="-1" aria-labelledby="personalDetailsLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center mb-3" >
                        <div class="col-md-6 text-center">
                          @php($profile_pic = $user['profile_img'])
                            <img id="image_preview_container" width="200px" height="200px"  class="border-rounded " src="{{asset('storage/'.$profile_pic)}}" alt="Profile Pic">
                        </div>
                    </div>

                    <input class="form-control" type="text" name="userID" id="userID" value="{{  $user['id'] }}" hidden>

                    <div class="row mb-2" >
                    <label for="name" class="col-form-label col-md-3">Name:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="name" id="name" value="{{  $user['name'] }}" readonly>
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="idNumber" class="col-form-label col-md-3">ID Number:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="userInstitution_id" id="userInstitution_id" value="{{  $user['userInstitution_id'] }}" readonly>
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="idNumber" class="col-form-label col-md-3">Department:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="department" id="department" value="{{  $user['department'] }}" readonly>
                    </div>
                    </div>

                    <div class="row mb-2">
                    <label for="day" class="col-form-label col-md-3">Email:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="email" name="email" id="email" value="{{  $user['email'] }}" readonly>
                    </div>
                    </div>

                    <div class="row mb-2">
                    <label for="day" class="col-form-label col-md-3">Password:</label>
                    <div class="col-md-9">
                        <button id="restoreDefault" type="button" class="btn btn-primary">Restore Default</button>
                    </div>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-footer apiBtn">
                    <button id="undoUpdate" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
        </form>
        @endforeach

        <!-- Add User Form -->
        <form action="/admin/addUser" id="user_setup_frm" method="post">
            <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">


                    <div class="row mb-2" >
                    <label for="name" class="col-form-label col-md-3">Name:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="name" id="name"  >
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="idNumber" class="col-form-label col-md-3">Email Address:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="email" name="email" id="email" >
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="user_type" class="col-form-label col-md-3">User Type:</label>
                    <div class="col-md-9">
                            <select name="user_type" id="user_type" class="form-control" required autofocus>
                                    <option value="" selected></option>
                                    <option  value="student">Student</option>
                                    <option  value="faculty">Faculty</option>
                                    <option  value="admin">Admin</option>
                                </select>
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="idNumber" class="col-form-label col-md-3">Department:</label>
                    <div class="col-md-9">
                          <select name="department" id="department" class="department-selection form-control" required autofocus>
                                    <option value="" selected></option>
                            </select>
                    </div>
                    </div>

                    <div class="row mb-2">
                    <label for="day" class="col-form-label col-md-3">School ID:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="userInstitution_id" id="userInstitution_id" >
                    </div>
                    </div>

                    <div class="row mb-2 "hidden>
                    <label for="day" class="col-form-label col-md-3">Password:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="password" name="password" id="password" value="defaultp@ssword" readonly>
                    </div>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-footer apiBtn">
                    <button id="undoUpdate" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="save" type="submit" class="btn btn-primary" >Save</button>
                </div>
                </div>
            </div>
            </div>
        </form>

          <!-- Add User Form -->

          <div class="col-lg-12">
            <div class="card">
              <div class="card-header bg-info text-white">
                <div class="row">
                    <button id="add" class="btn btn-md btn-warning col-md-2 " data-bs-toggle="modal" data-bs-target="#addUser">Add User</button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-secondary">
                        <tr>
                                <th scope="col">ID Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="faculty-list">
                            @foreach($userList as $user)
                                <tr data-id="{{ $user['id'] }}"> 
                                    <td class="facultyIdNumber">{{ $user['userInstitution_id'] }}</td> 
                                    <td class="facultyName">{{ $user['name'] }}</td> 
                                    <td class="facultyDepartment">{{ $user['department'] }}</td> 
                                    <td class="userType">{{ $user['user_type'] }}</td> 
                                    <td class="facultyEmail">{{ $user['email'] }}</td> 
                                    <td class="actionBTN">
                                        <button class="profileEdit btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#personalDetails{{$user['id']}}">View Details</button>
                                        @if($user['id'] != Auth::user()->id)
                                        <button class="delete btn btn-sm btn-danger">Delete</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->


<!-- <div class="container">
    <div class="row justify-content-center px-4">
        
        <h2 class=" m-0 mb-5 mt-3 header-label">
            User List
            <svg class="bi me-2"  width="25px" height="25px"><use xlink:href="#description-pointer"/></svg>
            <span class="h5">All users including faculty and students are viewed here.</span>
        </h2> -->

        <!-- Modal -->
        <!-- @foreach($userList as $user)
        @if($user['user_type'] != "admin")
        <form action="/updateProfile" id="profile_setup_frm" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="personalDetails{{$user['id']}}" tabindex="-1" aria-labelledby="personalDetailsLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center mb-3" >
                        <div class="col-md-6 text-center">
                          @php($profile_pic = $user['profile_img'])
                            <img id="image_preview_container" width="200px" height="200px"  class="border-rounded " src="{{asset('storage/'.$profile_pic)}}" alt="Profile Pic">
                        </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="name" class="col-form-label col-md-3">Name:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="name" id="name" value="{{  $user['name'] }}" readonly>
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="idNumber" class="col-form-label col-md-3">ID Number:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="userInstitution_id" id="userInstitution_id" value="{{  $user['userInstitution_id'] }}" readonly>
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="idNumber" class="col-form-label col-md-3">Department:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="department" id="department" value="{{  $user['department'] }}" readonly>
                    </div>
                    </div>

                    <div class="row mb-2">
                    <label for="day" class="col-form-label col-md-3">Email:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="email" name="email" id="email" value="{{  $user['email'] }}" readonly>
                    </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-footer apiBtn">
                    <button id="undoUpdate" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
        </form>
        @endif
        @endforeach -->

        <!-- Add User Form -->
        <!-- <form action="/admin/addUser" id="user_setup_frm" method="post">
            <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="row mb-2" >
                    <label for="name" class="col-form-label col-md-3">Name:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="name" id="name"  >
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="idNumber" class="col-form-label col-md-3">Email Address:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="email" name="email" id="email" >
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="user_type" class="col-form-label col-md-3">User Type:</label>
                    <div class="col-md-9">
                            <select name="user_type" id="user_type" class="form-select" required autofocus>
                                    <option value="" selected></option>
                                    <option  value="student">Student</option>
                                    <option  value="faculty">Faculty</option>
                                </select>
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="idNumber" class="col-form-label col-md-3">Department:</label>
                    <div class="col-md-9">
                          <select name="department" id="department" class="department-selection form-select" required autofocus>
                                    <option value="" selected></option>
                            </select>
                    </div>
                    </div>

                    <div class="row mb-2">
                    <label for="day" class="col-form-label col-md-3">School ID:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="userInstitution_id" id="userInstitution_id" >
                    </div>
                    </div>

                    <div class="row mb-2 "hidden>
                    <label for="day" class="col-form-label col-md-3">Password:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="password" name="password" id="password" value="defaultp@ssword" readonly>
                    </div>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-footer apiBtn">
                    <button id="undoUpdate" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="save" type="submit" class="btn btn-primary" >Save</button>
                </div>
                </div>
            </div>
            </div>
        </form> -->

          <!-- Add User Form -->

             <!-- <div class="col-md-4 mb-3">
                  <form class="row" action="/student/request-list" method="get">
                      <label for="filter" class="col-form-lable col-md-2 my-auto text-end">Filter:</label>
                        <div class="col-md-8">
                          <input type="text" name="facultyName" id="facultyName" class="form-control" placeholder="Enter Faculty Name">
                        </div>
                        <button type="submit" class="btn btn-md btn-primary col-md-2">
                          <svg class="bi"  width="15px" height="15px"><use xlink:href="#searchBTN"/></svg>
                        </button>
                  </form>
               </div> -->
          <!-- <div class="col-md-12 mt-1 border border-light shadow-lg rounded bg-white">
            <div class="row">
                    
                    <div class="col-md-6 text-start pb-3">
                      <button id="add" class="btn btn-md btn-primary col-md-4 mt-3" data-bs-toggle="modal" data-bs-target="#addUser">Add User</button>
                    </div>
                    
                    <div class="col-md-12 ">
                        <table class="table bg-white shadow-sm container-fluid">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col">ID Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="faculty-list">
                            @foreach($userList as $user)
                                @if($user['user_type'] != "admin")
                                <tr data-id="{{ $user['id'] }}"> 
                                    <td class="facultyIdNumber">{{ $user['userInstitution_id'] }}</td> 
                                    <td class="facultyName">{{ $user['name'] }}</td> 
                                    <td class="facultyDepartment">{{ $user['department'] }}</td> 
                                    <td class="userType">{{ $user['user_type'] }}</td> 
                                    <td class="facultyEmail">{{ $user['email'] }}</td> 
                                    <td class="actionBTN">
                                        <button class="profileEdit btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#personalDetails{{$user['id']}}">View Details</button>
                                        <button class="delete btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
          </div>  
        </div>
    </div>
</div> -->

@endsection