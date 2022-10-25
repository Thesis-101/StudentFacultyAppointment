@extends('layouts.app')

@section('content')
@vite(['resources/js/appointment-list.js'])
<div class="container-lg mt-5">
    <div class="row justify-content-center px-4">
        <!-- Modal -->
        <div class="modal fade" id="addForm" tabindex="-1" aria-labelledby="addFormLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reschedule Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="row mb-2">
                    <label for="day" class="col-form-label col-md-3">Day:</label>
                    <div class="col-md-9">
                      <select name="day" id="day" class="form-select" required>
                        <option value=""></option>
                        <option value="monday" >Monday</option>
                        <option value="tuesday" >Tuesday</option>
                        <option value="wednesday" >Wednesday</option>
                        <option value="thursday" >Thursday</option>
                        <option value="friday" >Friday</option>
                      </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="time1" class="col-form-label col-md-3">Time:</label>
                    <div class="col-md-4">
                      <input class="form-control" type="time" name="time1" id="time1" >
                    </div>
                    <label for="time2" class="col-form-label col-md-1">To</label>
                    <div class="col-md-4">
                      <input class="form-control" type="time" name="time2" id="time2">
                    </div>
                </div>

                <div class="row mb-2">
                  <label for="date" class="col-form-label col-md-3">Date:</label>
                  <div class="col-md-9">
                    <input class="form-control" type="date" name="date" id="date">
                  </div>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
              </div>
              <div class="modal-footer apiBtn">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="reschedule" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Applicant Details -->
        <div class="modal fade" id="details" tabindex="-1" aria-labelledby="detailsLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="detailsLabel">Requesitor Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="row mb-2">
                  <h5 id="studentName" class="text-center"></h5>
                </div>

                <div class="row mb-2">
                  <h5 id="studentId"  class="text-center"></h5>
                </div>

                <div class="row mb-2">
                  <h5 id="studentDepartment" class="text-center"></h5>
                </div>

                <div class="row mb-2">
                  <p id="purpose" class="text-start">Clearance</p>
                </div>

                <div class="row mb-2">
                  <p id="attendee" class="text-start">Group</p>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
              </div>
              <div class="modal-footer apiBtn">
                <!-- <button class="triggerAccept mx-1 btn btn-sm btn-primary px-3" >Accept</button>
                <button class="triggerChange mx-1  btn btn-sm btn-warning px-3" data-bs-toggle="modal" data-bs-target="#addForm" >Reschedule</button>
                <button class="triggerDecline mx-1  btn btn-sm btn-danger px-3" data-bs-toggle="modal" data-bs-target="#action">Decline</button> -->
                <button class="triggerAccept mx-1 btn btn-sm btn-primary px-3" data-bs-dismiss="modal" >Accept</button>
                <button class="triggerChange mx-1  btn btn-sm btn-warning px-3" data-bs-toggle="modal" data-bs-target="#addForm" >Reschedule</button>
                <button class="triggerDecline mx-1  btn btn-sm btn-danger px-3" data-bs-toggle="modal" data-bs-target="#action">Decline</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Declining Reason -->
        <div class="modal fade" id="action" tabindex="-1" aria-labelledby="actionLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="actionLabel">Decline Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="row mb-2">
                  <label for="reason" class="col-form-label col-md-3">Reason:</label>
                  <div class="col-md-9">
                    <textarea  class="form-control" name="reason" id="reason" ></textarea>
                  </div>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
              </div>
              <div class="modal-footer apiBtn">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="decline" type="button" data-bs-dismiss="modal" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>




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
                    <svg class="bi me-2"  width="20px" height="20px"><use xlink:href="#list-appointment"/></svg>
                    Appointment List</h5>
                <hr>
                <!-- <div class="col-md-4 mb-3">
                  <form class="row" action="/student/request-list" method="get">
                      <label for="filter" class="col-form-lable col-md-2 my-auto text-end">Filter:</label>
                        <div class="col-md-8">
                          <input type="text" name="facultyName" id="facultyName" class="form-control" placeholder="Enter Student Name">
                        </div>
                        <button type="submit" class="btn btn-md btn-primary col-md-2">
                          <svg class="bi"  width="15px" height="15px"><use xlink:href="#searchBTN"/></svg>
                        </button>
                  </form>
               </div> -->
                <table class="table bg-white shadow-sm container-fluid">
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
                </table>
            </div>
          </div>  
        </div>
    </div>
</div>

@endsection