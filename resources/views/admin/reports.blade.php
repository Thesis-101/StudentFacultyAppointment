@extends('layouts.app')

@section('content')
@vite(['resources/js/reports.js','resources/js/jquery.table2excel.js'])
<div class="container-lg py-5 100vh">
    <div class="row justify-content-center px-4">

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
                        <div class="col-md-2">
                            <button id="filter" type="submit" class="btn btn-md btn-primary">Search</button>
                        </div>
                    </div>
                </div>
        </form>


        <h5 class="py-3 m-0 header-label mt-5">
                    <svg class="bi me-2"  width="20px" height="20px"><use xlink:href="#transaction"/></svg>
                    Transaction List</h5>

          <div class="col-md-12">
            <div class="row">
                
                <button class="btn btn-sm btn-primary col-md-2 mx-2 mb-2" id="test">Export</button>
                <hr hidden>
                <table class="toExport_tbl table bg-white shadow-sm container-fluid">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">Student Name</th>
                        <th scope="col">Day</th>
                        <th scope="col">Time Slot</th>
                        <th scope="col">Date</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody id="report-list">
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection