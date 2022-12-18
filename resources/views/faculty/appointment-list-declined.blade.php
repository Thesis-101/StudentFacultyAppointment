@extends('layouts.new')

@section('content')
@vite(['resources/js/appointment-list.js'])

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Appointment List</h1>
            <span class=""></span>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="float-sm-right" style="list-style:none;">
              <li>This panel is for responding to appointments and viewing student details as well.</li>
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
          <!-- Reschedule -->
          <div class="modal fade" id="addForm" tabindex="-1" aria-labelledby="addFormLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-info">
                  <h5 class="modal-title text-white" id="exampleModalLabel">Reschedule Appointment</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                  <div class="row mb-2">
                      <label for="day" class="col-form-label col-md-3">Day:</label>
                      <div class="col-md-9">
                        <select name="day" id="day" class="form-control" required>
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
                      <input class="form-control" type="date" name="date" id="date" placeholder="Select Date">
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
                <div class="modal-header bg-info">
                  <h5 class="modal-title text-white" id="detailsLabel">Requesitor Details</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body p-0">

                  <div class="row justify-items-center">
                    <h3 id="studentName" class="text-center col-12 mb-0 mt-3"></h3>
                  </div>

                  <div class="row justify-items-center">
                    <p id="studentId"  class="text-center text-secondary col-12 mb-0"></p>
                  </div>

                  <div class="row justify-items-center">
                    <p id="studentDepartment" class="text-center text-secondary col-12"></p>
                  </div>
                  <hr class="text-light">
                  <div class="row mt-2 px-4">
                    <p id="purpose" class="text-start mb-0"></p>
                  </div>

                  <div class="row mb-2 px-4">
                    <p id="attendee" class="text-start mb-0"></p>
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
                <div class="modal-header bg-info">
                  <h5 class="modal-title text-white" id="actionLabel">Decline Appointment</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>
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

          <!-- Appointment Remarks -->
          <div class="modal fade" id="remarks" tabindex="-1" aria-labelledby="remarksLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-info">
                  <h5 class="modal-title text-white" id="actionLabel">Appointment Remarks</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                  <div class="row mb-2">
                    <label for="remarksVal" class="col-form-label col-md-3">Remarks:</label>
                    <div class="col-md-9">
                      <textarea  class="form-control" name="remarksVal" id="remarksVal" ></textarea>
                    </div>
                  </div>

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="PUT">
                </div>
                <div class="modal-footer apiBtn">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button id="triggerEnd" type="button" data-bs-dismiss="modal" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </div>
        <!-- Modal -->

          <div class="col-lg-12">
            <div class="card">
              <div class="card-header bg-info text-white">
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <h5 class="m-0 ">Transaction List (Declined)</h5>
                  </div>
                  <div class="col-md-6">
                    <form class="d-flex justify-content-end" id="filter-student" action="" method="get">
                      <input type="text" class="form-control w-50 mr-2" id="student-name-value" placeholder="Search Student">
                      <button class="btn btn-sm btn-warning px-4" type="submit">Search</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-secondary">
                          <tr>
                            <th>Student Name</th>
                            <th>Day</th>
                            <th>Time Slot</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                    </thead>
                    <tbody id="declined-list">
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

<!-- <div class="container-lg mt-3">
    <div class="row justify-content-center px-4">

        <h2 class=" m-0 mb-5 header-label">
            Appointment List
            <svg class="bi me-2"  width="25px" height="25px"><use xlink:href="#description-pointer"/></svg>
            <span class="h5">This panel is for responding to appointments and viewing student details as well.</span>
        </h2> -->


        <!-- Reschedule -->
        <!-- <div class="modal fade" id="addForm" tabindex="-1" aria-labelledby="addFormLabel" aria-hidden="true">
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
                    <input class="form-control" type="date" name="date" id="date" placeholder="Select Date">
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
        </div> -->

        <!-- Applicant Details -->
        <!-- <div class="modal fade" id="details" tabindex="-1" aria-labelledby="detailsLabel" aria-hidden="true">
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
              <div class="modal-footer apiBtn"> -->
                <!-- <button class="triggerAccept mx-1 btn btn-sm btn-primary px-3" >Accept</button>
                <button class="triggerChange mx-1  btn btn-sm btn-warning px-3" data-bs-toggle="modal" data-bs-target="#addForm" >Reschedule</button>
                <button class="triggerDecline mx-1  btn btn-sm btn-danger px-3" data-bs-toggle="modal" data-bs-target="#action">Decline</button> -->
                <!-- <button class="triggerAccept mx-1 btn btn-sm btn-primary px-3" data-bs-dismiss="modal" >Accept</button>
                <button class="triggerChange mx-1  btn btn-sm btn-warning px-3" data-bs-toggle="modal" data-bs-target="#addForm" >Reschedule</button>
                <button class="triggerDecline mx-1  btn btn-sm btn-danger px-3" data-bs-toggle="modal" data-bs-target="#action">Decline</button>
              </div>
            </div>
          </div>
        </div> -->

        <!-- Declining Reason -->
        <!-- <div class="modal fade" id="action" tabindex="-1" aria-labelledby="actionLabel" aria-hidden="true">
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
        </div> -->

        <!-- Appointment Remarks -->
        <!-- <div class="modal fade" id="remarks" tabindex="-1" aria-labelledby="remarksLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="actionLabel">Appointment Remarks</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="row mb-2">
                  <label for="remarksVal" class="col-form-label col-md-3">Remarks:</label>
                  <div class="col-md-9">
                    <textarea  class="form-control" name="remarksVal" id="remarksVal" ></textarea>
                  </div>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
              </div>
              <div class="modal-footer apiBtn">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="triggerEnd" type="button" data-bs-dismiss="modal" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div> -->

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

          <!-- <div class="col-md-12 bg-white border border-light shadow-lg rounded mt-3">
            <div class="row"> -->
                
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

               <!-- <div class="col-md-12 pt-3 ">
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
</div> -->

@endsection