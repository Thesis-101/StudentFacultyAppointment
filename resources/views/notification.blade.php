@extends('layouts.new')

@section('content')
@vite(['resources/js/notifications.js'])

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Notifications</h1>
            <span class=""></span>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="float-sm-right" style="list-style:none;">
              <li>This panel is to notify the faculty if a student sent an appointment.</li>
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
                <h5 class="m-0 ">Messages</h5>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-secondary">
                        <tr>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="notification-list">
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
            Notifications
            <svg class="bi me-2"  width="25px" height="25px"><use xlink:href="#description-pointer"/></svg>
            <span class="h5">This panel is to notify the faculty if a student sent an appointment.</span>
        </h2> -->
        <!-- <div class="col-md-8">
            <h4 class="header-label text-start mb-4 offset-3">Notification</h4>
            
            <div class="notification-list shadow-sm bg-white form-container m-auto">
            </div>
        </div> -->

        <!-- <div class="col-md-8 mt-5 border border-light shadow-lg rounded bg-white">
            <div class="row">
                <div class="col-md-12 pt-3">
                    <hr hidden>
                <div class="table-wrapper px-0">
                        <table class="table bg-white shadow-sm container-fluid ">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Message</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="notification-list">
                            </tbody>
                        </table>
                </div>
                </div>
                
                
                
            </div> -->
            <!-- <div class="row">
                <div class="col-md-12 text-white">asd</div>
            </div> -->
        <!-- </div>
    </div>
</div> -->
@endsection
