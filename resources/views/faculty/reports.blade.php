@extends('layouts.app')

@section('content')
@vite(['resources/js/reports.js','resources/js/jquery.table2excel.js'])
<div class="container-lg">
    <div class="row justify-content-center px-4">
        <h2 class=" m-0 mb-5 mt-3 header-label">
            Generate Report
            <svg class="bi me-2"  width="25px" height="25px"><use xlink:href="#description-pointer"/></svg>
            <span class="h5">This panel is for generating reports.</span>
        </h2>

        <form id="filter_form" action="" method="get">
                <div class="col-md-12">
                    <div class="row">
                        <p class="col-md-1 mb-0 align-self-center">Filter Status:</p>
                        
                        <div class="col-md-3">
                            <select name="filterStatus" id="filterStatus" class="form-select" placeholder="Select Status">
                                <option value="all" >All</option>
                                <option value="Accepted" >Accepted</option>
                                <option value="Declined" >Declined</option>
                                <option value="pending" >Pending</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <div class="row">
                            <label for="dataMonth" class="col-form-label col-md-4 text-end">Month:</label>
                            <div class="col-md-8"><input id="dataMonth" class="form-control" type="month"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button id="filter" type="submit" class="btn btn-md btn-primary">Search</button>
                        </div>
                    </div>
                </div>
        </form>


          <div class="col-md-12 bg-white border border-light shadow-lg rounded">
            <div class="row">
                <div class="col-md-12 pt-3 text-end">
                    <button class="btn btn-sm btn-primary col-md-2 mx-2 mb-2" id="test">Export</button>
                    <hr hidden>
                    <table class="toExport_tbl table bg-white shadow-sm text-start container-fluid">
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