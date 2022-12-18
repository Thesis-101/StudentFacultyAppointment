@extends('layouts.new')

@section('content')
@vite(['resources/js/student-side.js'])
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List of Faculty</h1>
            <span class=""></span>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="float-sm-right" style="list-style:none;">
              <li>This panel shows the list of faculty.</li>
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

        <!-- Modal -->
        <!-- Faculty Details -->
        <!-- <div class="modal fade" id="details" tabindex="-1" aria-labelledby="detailsLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Faculty Details</h4>
              </div>
              <div class="modal-body">
                <div class="row mb-2">
                    <h5 id="facultyId" class="text-center"></h5>
                  </div>

                  <div class="row mb-2">
                    <h5 id="facultyName"  class="text-center"></h5>
                  </div>

                  <div class="row mb-2">
                    <h5 id="facultyDepartment" class="text-center"></h5>
                  </div>
                  <hr>
                  <div class="row mb-2">
                    <h5 class="mb-5">Schedule:</h5>
                    <table class="table bg-white shadow-sm w-70">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Day</th>
                          <th scope="col">Office</th>
                          <th scope="col">Time Slot</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="schedule-list">
                      </tbody>
                    </table>
                  </div>

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="PUT">
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div> -->


        <div class="modal fade" id="details" tabindex="-1" aria-labelledby="detailsLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="detailsLabel">Faculty Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa fa-xmark" aria-hidden="true"></span></button> -->
              </div>
              <div class="modal-body">

                <div class="row mb-2">
                  <h5 id="facultyId" class="col-md-12 text-center"></h5>
                </div>

                <div class="row mb-2">
                  <h5 id="facultyName"  class="col-md-12 text-center"></h5>
                </div>

                <div class="row mb-2">
                  <h5 id="facultyDepartment" class=" col-md-12 text-center"></h5>
                </div>
                <hr>
                <div class="row mb-2">
                  <table class="table table-bordered">
                    <thead class="bg-secondary">
                      <tr>
                        <th scope="col">Day</th>
                        <th scope="col">Office</th>
                        <th scope="col">Time Slot</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="schedule-list">
                    </tbody>
                  </table>
                  <!-- <table class="table bg-white shadow-sm w-70">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">Day</th>
                        <th scope="col">Office</th>
                        <th scope="col">Time Slot</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="schedule-list">
                    </tbody>
                  </table> -->
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addForm" tabindex="-1" aria-labelledby="addFormLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="exampleModalLabel">Set Appointment</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">

                <div class="row mb-2" hidden>
                  <label for="idNumber" class="col-form-label col-md-3">ID Number:</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="idNumber" id="idNumber" value={{ Auth::user()->userInstitution_id }}>
                  </div>
                </div>

                <div class="row mb-2" >
                  <label for="day" class="col-form-label col-md-3">Day:</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="day" id="day" readonly>
                  </div>
                </div>

                <div class="row mb-2" >
                  <label for="time" class="col-form-label col-md-3">Vacant Time:</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="time" id="time" readonly>
                  </div>
                </div>

                <div class="row mb-2" hidden>
                  <label for="office" class="col-form-label col-md-3">Office:</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="office" id="office">
                  </div>
                </div>

                <div class="row mb-2" hidden>
                  <label for="student-email" class="col-form-label col-md-3">Student Email:</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="student-email" id="student-email" value="{{Auth::user()->email}}">
                  </div>
                </div>

              <!--- Calendar Component ---->
                <div class="row mb-2">
                    <label for="date" class="col-form-label col-md-3">Date:</label>
                    <div class="col-md-9">
                        <input class="form-control appointmentDate" type="date" name="date" id="date" placeholder="Select Date">
                    </div>
                </div>
              <!--- Calendar Component ---->

                <div class="row mb-2">
                  <label for="attendee" class="col-form-label col-md-3">Purpose:</label>
                  <div class="col-md-9" >
                    <input type="text" name="request" id="request" class="form-control">
                  </div>
                </div>

                <div class="row mb-2" hidden>
                  <label for="attendee" class="col-form-label col-md-3">Attendee Type:</label>
                  <div class="col-md-9">
                    <select name="attendee" id="attendee" class="form-select">
                      <option value="" ></option>
                      <option value="individual" selected>Individual</option>
                      <option value="group" >Group</option>
                    </select>
                  </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
              </div>
              <div class="modal-footer apiBtn">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="appoint" type="button" class="btn btnWatcher btn-primary" data-bs-dismiss="modal">Save</button>
              </div>
            </div>
          </div>
        </div>

        <input type="text" name="requesitor" id="requesitor" value="{{ Auth::user()->id }}" hidden>
        <!-- Modal end -->

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header bg-info text-white">
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <h5 class="m-0 ">Faculty List</h5>
                  </div>
                  <div class="col-md-6">
                    <form class="d-flex justify-content-end" id="filter-faculty" action="" method="get">
                      <input type="text" class="form-control w-50 mr-2" id="faculty-name-value" placeholder="Search Faculty">
                      <button class="btn btn-sm btn-warning px-4" type="submit">Search</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
              <table class="table table-bordered">
                  <thead class="bg-secondary">
                    <tr>
                      <th>Faculty Name</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody id="faculty-list">
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

<!-- <div class="container mt-3">
    <div class="row justify-content-center px-4">
        <h2 class=" m-0 mb-5 header-label">
            List of Faculty
            <svg class="bi me-2"  width="25px" height="25px"><use xlink:href="#description-pointer"/></svg>
            <span class="h5">This panel shows the list of faculty.</span>
        </h2>
        
        <div class="col-md-6 bg-white border border-light shadow-lg rounded mt-3">
              
            <div class="row">
               <h5 class="pt-3 m-0  header-label ">
                    <svg class="bi me-2"  width="20px" height="20px"><use xlink:href="#list-faculty"/></svg>
                     Faculty List
                </h5> -->
                <!-- <div class="col-md-6">
                  <form class="row" action="/student/faculty-list" method="get">
                      <label for="filter" class="col-form-lable col-md-2 my-auto text-end">Filter:</label>
                        <div class="col-md-8">
                          <input type="text" name="facultyName" id="facultyName" class="form-control" placeholder="Enter Faculty Name">
                        </div>
                        <button type="submit" class="btn btn-md btn-primary col-md-2">
                          <svg class="bi"  width="15px" height="15px"><use xlink:href="#searchBTN"/></svg>
                        </button>
                  </form>
               </div> -->
               <!-- <div class="col-md-12 pt-2 ">
                <table class="table bg-white shadow-sm container-fluid mt-3">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Faculty Name</th>
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
</div> -->

@endsection