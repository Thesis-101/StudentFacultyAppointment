@extends('layouts.app')

@section('content')
@vite(['resources/js/request-list.js'])
<div class="container mt-5">
    <div class="row justify-content-center px-4 mt-5">
        <h5 class="py-3 m-0 header-label ">
                    <svg class="bi me-2"  width="20px" height="20px"><use xlink:href="#list-appointment"/></svg>
                    Appointment List</h5>
        <div class="col-md-12 ">
            <div class="row">
                
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

@endsection