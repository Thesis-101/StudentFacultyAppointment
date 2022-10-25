@extends('layouts.app')

@section('content')
@vite(['resources/js/vacant.js'])
@vite(['resources/js/profileUpdate.js'])
<div class="container mt-5">
    <div class="row justify-content-center px-4">

        <!-- Modal -->
        <!-- <form method="post"> -->
          <div class="modal fade" id="addForm" tabindex="-1" aria-labelledby="addFormLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input id="userInstitution_id" type="text" value="{{ Auth::user()->userInstitution_id }}" hidden>
                  <div class="row mb-2">
                    <label for="day" class="col-form-label col-md-3">Day:</label>
                    <div class="col-md-9">
                      <select name="day" id="day" class="form-select" required>
                        <option value="monday" >Monday</option>
                        <option value="tuesday" >Tuesday</option>
                        <option value="wednesday" >Wednesday</option>
                        <option value="thursday" >Thursday</option>
                        <option value="friday" >Friday</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <label for="time1" class="col-form-label col-md-3">Time Slot:</label>
                    <div class="col-md-4">
                      <input class="form-control" type="time" name="time1" id="time1" >
                    </div>
                    <label for="time2" class="col-form-label col-md-1">To</label>
                    <div class="col-md-4">
                      <input class="form-control" type="time" name="time2" id="time2">
                    </div>
                  </div>

                  <div class="row mb-2">
                    <label for="office" class="col-form-label col-md-3">Office:</label>
                    <div class="col-md-9">
                      <select name="office" id="office" class="department-selection form-select" >
                        <option value="" selected></option>
                      </select>
                    </div>
                  </div>

                </div>
                <div class="modal-footer" id="apiBtn">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="target-bttn btn btn-primary" id="newVacant">Save</button>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="PUT">
        <!-- </form> -->
        
        <!-- <div class="row mb-3 mt-5">
            <h4 class="header-label text-start my-auto col-md-9">Vacant Time</h4>
            <button id="add" class="btn btn-md btn-primary col-md-3" data-bs-toggle="modal" data-bs-target="#addForm">Add Time Slot</button>
        </div>
        <table class="table bg-white shadow-sm">
          <input id="lastItem" hidden></input>
            <thead class="table-dark ">
              <tr>
                <th scope="col">Day</th>
                <th scope="col">Time Slot</th>
                <th scope="col">Designated Office</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="vacant_list">
            </tbody>
          </table> -->

          <form action="/updateProfile" id="profile_setup_frm" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="personalDetails" tabindex="-1" aria-labelledby="personalDetailsLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center mb-3" >
                        <div class="col-md-6 text-center">
                            @php($profile_pic = Auth::user()->profile_img)
                            <img id="image_preview_container" width="200px" height="200px"  class="border-rounded "  src="@if($profile_pic == null ) ../../../../../public/storage/images/default-avatar.jpg @else {{asset('storage/'.$profile_pic)}} @endif" alt="Profile Pic">
                        </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="idNumber" class="col-form-label col-md-3">Profile Picture:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="profile_img" id="profile_img">
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="idNumber" class="col-form-label col-md-3">Name:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="idNumber" class="col-form-label col-md-3">ID Number:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="userInstitution_id" id="userInstitution_id" value={{ Auth::user()->userInstitution_id }}>
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="idNumber" class="col-form-label col-md-3">Department:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="department" id="department" value="{{ Auth::user()->department }}">
                    </div>
                    </div>

                    <div class="row mb-2">
                    <label for="day" class="col-form-label col-md-3">Email:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="email" name="email" id="email" value={{ Auth::user()->email }}>
                    </div>
                    </div>

                    <!-- <div class="row mb-2" hidden>
                    <label for="time" class="col-form-label col-md-3">Vacant Time:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="time" id="time">
                    </div>
                    </div>

                    <div class="row mb-2" hidden>
                    <label for="office" class="col-form-label col-md-3">Office:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="office" id="office">
                    </div>
                    </div>

                    <div class="row mb-2">
                    <label for="date" class="col-form-label col-md-3">Date:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="date" name="date" id="date">
                    </div>
                    </div>

                    <div class="row mb-2">
                    <label for="attendee" class="col-form-label col-md-3">Purpose:</label>
                    <div class="col-md-9" >
                        <input type="text" name="request" id="request" class="form-control">
                    </div>
                    </div>

                    <div class="row mb-2">
                    <label for="attendee" class="col-form-label col-md-3">Attendee Type:</label>
                    <div class="col-md-9">
                        <select name="attendee" id="attendee" class="form-select">
                        <option value="" selected>--------</option>
                        <option value="individual" >Individual</option>
                        <option value="group" >Group</option>
                        </select>
                    </div>
                    </div> -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-footer apiBtn">
                    <button id="undoUpdate" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="appoint" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                </div>
                </div>
            </div>
            </div>
        </form>
        
        <form action="/change-password" id="new_password_frm" method="post">
            <div class="modal fade" id="passwordChange" tabindex="-1" aria-labelledby="passwordChangeLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row mb-2" >
                        <label for="oldPassword" class="col-form-label col-md-4">Old Password:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="oldPassword" id="oldPassword">
                            @error('oldPassword')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2" >
                        <label for="new_password" class="col-form-label col-md-4">New Password:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="new_password" id="new_password">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2" >
                        <label for="new_password_confirmation" class="col-form-label col-md-4">Confirm Password:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="new_password_confirmation" id="new_password_confirmation">
                            @error('new_password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-footer apiBtn">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="sendUpdate" type="submit" class="btn btn-primary">Save</button>
                </div>
                </div>
            </div>
            </div>
        </form>

            <!-- <h4 class="header-label text-start mb-4 offset-3">Profile</h4> -->
            <div class="row">
              <div class="col-md-2 shadow-sm bg-white form-container ">
                  <div class="user-details text-center">
                      @php($profile_pic = Auth::user()->profile_img)
                      <img id="profilePic" width="100px" height="100px" class="border-rounded " src="@if($profile_pic == null ) {{asset('storage/images/default-avatar.jpg')}} @else {{asset('storage/'.$profile_pic)}} @endif" alt="Profile Pic">
                      <h5 id="profileName" class="text-center mb-0 mt-2 header-label">{{ Auth::user()->name }}</h5>
                      <p class="text-center mb-3">{{ Auth::user()->userInstitution_id }}</p>  
                  </div>
                  <hr>
                  <div class="other-details mb-5">
                      <p class="mb-1">User Type: <span class="user-type">Faculty</span></p>
                      <p>Email: <span class="user-email">{{Auth::user()->email}}</span></p>
                  </div>
                  <div class="row">
                      <button class="btn btn-md btn-primary col-md-6 mx-auto mb-2" data-bs-toggle="modal" data-bs-target="#personalDetails">Edit Profile</button>
                  </div>
                  <div class="row">
                      <button class="btn btn-md btn-primary col-md-6 mx-auto" data-bs-toggle="modal" data-bs-target="#passwordChange">Change Password</button>
                  </div>
              </div>


              <div class="col-md-8 border shadow-sm bg-white">
                <div class="row">
                  <div class="row">
                    <div class="col-md-6">
                      <h4 class="m-0 header-label mt-4">
                        <svg class="bi me-2"  width="20px" height="20px"><use xlink:href="#time"/></svg>
                        Vacant Time
                      </h4>
                    </div>
                    <div class="col-md-6 text-end pb-3">
                      <button id="add" class="btn btn-md btn-primary col-md-4 mt-3" data-bs-toggle="modal" data-bs-target="#addForm">Add Time Slot</button>
                    </div>
                  </div>
                    
                    <hr>
                    <table class="table bg-white shadow-sm container">
                        <input id="lastItem" hidden></input>
                        <thead class="table-dark">
                          <tr>
                            <th scope="col">Day</th>
                            <th scope="col">Time Slot</th>
                            <th scope="col">Designated Office</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody id="vacant_list">
                        </tbody>
                    </table>
                </div>
              <div>  
            </div>

          
    </div>
</div>
@endsection
