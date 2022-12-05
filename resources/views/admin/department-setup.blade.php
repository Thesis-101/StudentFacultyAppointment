@extends('layouts.new')

@section('content')
@vite(['resources/js/department-list.js'])

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Department Setup</h1>
            <span class=""></span>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="float-sm-right" style="list-style:none;">
              <li>Adding, editing, or deleting a department is done here.</li>
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
        <div class="row justify-content-center">

          <!-- Add User Form -->
        <!-- <form action="/admin/addUser" id="user_setup_frm" method="post"> -->
        <div class="modal fade" id="addDepartment" tabindex="-1" aria-labelledby="addDepartmentLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add New Department</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>
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

          <div class="col-lg-8">
            <div class="card">
              <div class="card-header bg-info text-white">
                <div class="row">
                  <button id="add" class="btn btn-md btn-warning col-md-4" data-bs-toggle="modal" data-bs-target="#addDepartment">Add Department</button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-secondary">
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->


<!-- <div class="container">
    <div class="row justify-content-center px-4">
        <h2 class=" m-0 mb-5 mt-3 header-label">
            Department Setup
            <svg class="bi me-2"  width="25px" height="25px"><use xlink:href="#description-pointer"/></svg>
            <span class="h5">Adding, editing, or deleting a department is done here.</span>
        </h2> -->
        <!-- Add User Form -->
        <!-- <form action="/admin/addUser" id="user_setup_frm" method="post"> -->
            <!-- <div class="modal fade" id="addDepartment" tabindex="-1" aria-labelledby="addDepartmentLabel" aria-hidden="true">
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
            </div> -->
        <!-- </form> -->

          <!-- Add User Form -->


          <!-- <div class="col-md-6 mt-1 border border-light shadow-lg rounded bg-white">
            <div class="row">
                    <div class="col-md-6 text-start pb-3">
                      <button id="add" class="btn btn-md btn-primary col-md-6 mt-3" data-bs-toggle="modal" data-bs-target="#addDepartment">Add Department</button>
                    </div> -->
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
               <!-- <div class="col-md-12 ">
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
</div> -->

@endsection