@extends('layouts.app')

@section('content')
@vite(['resources/js/reports.js','resources/js/jquery.table2excel.js'])
<div class="container-lg ">
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
                        </div>

                        <!-- <div class="col-md-2">
                            <button id="filter" type="submit" class="btn btn-md btn-primary">Search</button>
                        </div> -->
                    </div>
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
</div>

@endsection