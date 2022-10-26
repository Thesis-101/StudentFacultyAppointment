@extends('layouts.app')

@section('content')
@vite(['resources/js/department-list.js'])
<div class="container">
    <div class="row justify-content-center px-4">

        <!-- Add User Form -->
        <!-- <form action="/admin/addUser" id="user_setup_frm" method="post"> -->
            <div class="modal fade" id="addDepartment" tabindex="-1" aria-labelledby="addDepartmentLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="row mb-2" >
                    <label for="department" class="col-form-label col-md-4">Department Name:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="department" id="departmentVal">
                    </div>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-footer apiBtn">
                    <button id="undoUpdate" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="save" type="button" class="changingBTN btn btn-primary" >Save</button>
                </div>
                </div>
            </div>
            </div>
        <!-- </form> -->

          <!-- Add User Form -->


          <div class="col-md-6 mt-5">
            <div class="row">
                <h5 class="py-3 m-0 header-label col-md-6">
                    <svg class="bi me-2"  width="20px" height="20px"><use xlink:href="#department"/></svg>
                    Department List</h5>
                    <div class="col-md-6 text-end pb-3">
                      <button id="add" class="btn btn-md btn-primary col-md-6 mt-3" data-bs-toggle="modal" data-bs-target="#addDepartment">Add Department</button>
                    </div>
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
                          <th scope="col">Department Name</th>
                          <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="department-list">
                    </tbody>
                </table>
            </div>
          </div>  
        </div>
    </div>
</div>

@endsection