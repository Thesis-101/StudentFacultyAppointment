@extends('layouts.app')

@section('content')
@vite(['resources/js/faculty-list.js'])
<div class="container-lg mt-5">
    <div class="row justify-content-center px-4">
        <!-- Modal -->
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
                            <img id="image_preview_container" width="200px" height="200px"  class="border-rounded " src="@if($profile_pic == null ) {{asset('storage/images/default-avatar.jpg')}} @else {{asset('storage/'.$profile_pic)}} @endif" alt="Profile Pic">
                        </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="profile_img" class="col-form-label col-md-3">Profile Picture:</label>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="profile_img" id="profile_img">
                    </div>
                    </div>

                    <div class="row mb-2" >
                    <label for="name" class="col-form-label col-md-3">Name:</label>
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


        <!-- <h5 class="my-5 header-label">Appointment List</h5>
        <table class="table bg-white shadow-sm">
            <thead class="table-dark">
              <tr>
                <th scope="col">Student Name</th>
                <th scope="col">Day</th>
                <th scope="col">Time Slot</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="appointment-list">
            </tbody>
          </table> -->

          <div class="col-md-12 border shadow-sm mt-5">
            <div class="row">
                <h5 class="py-3 m-0 header-label ">
                    <svg class="bi me-2"  width="20px" height="20px"><use xlink:href="#list-faculty"/></svg>
                    Faculty List</h5>
                <hr>
                <div class="col-md-4 mb-3">
                  <form class="row" action="/student/request-list" method="get">
                      <label for="filter" class="col-form-lable col-md-2 my-auto text-end">Filter:</label>
                        <div class="col-md-8">
                          <input type="text" name="facultyName" id="facultyName" class="form-control" placeholder="Enter Faculty Name">
                        </div>
                        <button type="submit" class="btn btn-md btn-primary col-md-2">
                          <svg class="bi"  width="15px" height="15px"><use xlink:href="#searchBTN"/></svg>
                        </button>
                  </form>
               </div>
                <table class="table bg-white shadow-sm container-fluid">
                    <thead class="table-dark">
                        <tr>
                          <th scope="col">ID Number</th>
                          <th scope="col">Faculty Name</th>
                          <th scope="col">Department</th>
                          <th scope="col">Email</th>
                          <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="faculty-list">
                    </tbody>
                </table>
            </div>
          </div>  
        </div>
    </div>
</div>

@endsection