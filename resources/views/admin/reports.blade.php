@extends('layouts.new')

@section('content')
@vite(['resources/js/reports.js','resources/js/jquery.table2excel.js'])

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Generate Report</h1>
            <span class=""></span>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="float-sm-right" style="list-style:none;">
              <li>This panel is for generating reports.</li>
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
                <div class="row align-items-center">
                    <h5 class="m-0 col-md-3">Transaction List</h5>
                    <div class="col-md-9 justify-items-end">
                        <p id="userType" hidden>{{Auth::user()->user_type}}</p>
                        <form id="filter_form" action="" method="get">
                            <div class="col-md-12">
                                <div class="row">
                                    <p class="col-md-2 mb-0 align-self-center">Filter Status:</p>
                                    
                                    <div class="col-md-3">
                                        <select name="filterStatus" id="filterStatus" class="form-control" placeholder="Select Status">
                                            <option value="all" >All</option>
                                            <option value="Accepted" >Accepted</option>
                                            <option value="Declined" >Declined</option>
                                            <option value="pending" >Pending</option>
                                            <option value="Ongoing" >Ongoing</option>
                                            <option value="Completed" >Completed</option>
                                        </select>
                                    </div>

                                    <div id="monthDateRadio" class="col-md-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDate" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Date
                                            </label>
                                            </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioMonth" >
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Month
                                            </label>
                                        </div>
                                    </div>

                                    <div id="dateDiv" class="col-md-3" hidden>
                                        <div class="row">
                                        <div class="col-md-8"><input id="dataDate" class="form-control" type="date" placeholder="Select Date" ></div>
                                        <button id="filter" type="submit" class="col-md-4 btn btn-md btn-warning">Search</button>
                                        </div>
                                    </div>

                                    <div id="monthDiv" class="col-md-3" hidden>
                                        <div class="row">
                                        <div class="col-md-8"><input id="dataMonth" class="form-control" type="month" placeholder="Select Month" ></div>
                                        <button id="filter" type="submit" class="col-md-4 btn btn-md btn-warning">Search</button>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-2">
                                        <button id="filter" type="submit" class="btn btn-md btn-primary">Search</button>
                                    </div> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                
              </div>
              <div class="card-body">
                <button class="btn btn-sm btn-primary col-md-2 mx-2 mb-2" id="test">Export</button>
                <hr hidden>
                <table class="toExport_tbl table table-bordered">
                    <thead class="bg-secondary">
                        <tr>
                            <th>Student Name</th>
                            <th>Day</th>
                            <th>Time Slot</th>
                            <th>Date</th>
                            <th>Purpose</th>
                            <th>Status</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody id="report-list">
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


<!-- <div class="container-lg ">
    <div class="row justify-content-center px-4">
        <h2 class=" m-0 mb-5 mt-3 header-label">
            Generate Report
            <svg class="bi me-2"  width="25px" height="25px"><use xlink:href="#description-pointer"/></svg>
            <span class="h5">This panel is for generating reports.</span>
        </h2>

        <p id="userType" hidden>{{Auth::user()->user_type}}</p>
        <form id="filter_form" action="" method="get">
                <div class="col-md-12 mt-3 mb-1">
                    <div class="row">
                        <p class="col-md-1 mb-0 align-items-center">Filter Status:</p>
                        
                        <div class="col-md-3">
                            <select name="filterStatus" id="filterStatus" class="form-select" placeholder="Select Status">
                                <option value="all" >All</option>
                                <option value="Accepted" >Accepted</option>
                                <option value="Declined" >Declined</option>
                                <option value="pending" >Pending</option>
                                <option value="Ongoing" >Ongoing</option>
                                <option value="Completed" >Completed</option>
                            </select>
                        </div>

                        <div id="monthDateRadio" class="col-md-1">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDate" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Date
                                </label>
                                </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioMonth" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Month
                                </label>
                            </div>
                        </div>

                        <div id="dateDiv" class="col-md-3" hidden>
                            <div class="row">
                            <div class="col-md-8"><input id="dataDate" class="form-control" type="date" placeholder="Select Date" ></div>
                            <button id="filter" type="submit" class="col-md-4 btn btn-md btn-primary">Search</button>
                            </div>
                        </div>

                        <div id="monthDiv" class="col-md-3" hidden>
                            <div class="row">
                            <div class="col-md-8"><input id="dataMonth" class="form-control" type="month" placeholder="Select Month" ></div>
                            <button id="filter" type="submit" class="col-md-4 btn btn-md btn-primary">Search</button>
                            </div>
                        </div> -->

                        <!-- <div class="col-md-2">
                            <button id="filter" type="submit" class="btn btn-md btn-primary">Search</button>
                        </div> -->
                    <!-- </div>
                </div>
        </form>


          <div class="col-md-12 bg-white border border-light shadow-lg rounded">
            <div class="row">
                <div class="col-md-12 pt-3 text-end">
                <button class="btn  btn-sm btn-primary col-md-2 mx-2 mb-2" id="test">Export</button>
                <hr hidden>
                <table class="toExport_tbl table text-start bg-white shadow-sm container-fluid">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">Student Name</th>
                        <th scope="col">Day</th>
                        <th scope="col">Time Slot</th>
                        <th scope="col">Date</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Status</th>
                        <th scope="col">Remarks</th>
                    </tr>
                    </thead>
                    <tbody id="report-list">
                    </tbody>
                </table>
                </div>
                

            </div>
        </div>
    </div>
</div> -->

@endsection