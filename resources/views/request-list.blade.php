@extends('layouts.new')

@section('content')
@vite(['resources/js/request-list.js'])

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
              <li>This panel is for viewing the latest appointment added.</li>
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
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header bg-info text-white">
                <h5 class="m-0 ">Transaction List</h5>
              </div>
              <div class="card-body">
              <table class="table table-bordered">
                    <thead class="bg-secondary">
                        <tr>
                            <th>Faculty Name</th>
                            <th>Designated Office</th>
                            <th>Time Slot</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="appointmentList">
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
    <div class="row justify-content-center px-4 ">
        <h2 class=" m-0 mb-5 header-label">
            Appointment List
            <svg class="bi me-2"  width="25px" height="25px"><use xlink:href="#description-pointer"/></svg>
            <span class="h5">This panel is for viewing the latest appointment added.</span>
        </h2>

        <div class="col-md-12 bg-white border border-light shadow-lg rounded mt-3">
            <div class="row"> -->
                
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
               <!-- <div class="col-md-12 pt-3 ">
                    <table class="table bg-white shadow-sm container-fluid">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Faculty Name</th>
                                <th scope="col">Designated Office</th>
                                <th scope="col">Time Slot</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="appointmentList">
                        </tbody>
                    </table>
               </div>
            </div>
            
        </div>
    </div>
</div> -->

@endsection