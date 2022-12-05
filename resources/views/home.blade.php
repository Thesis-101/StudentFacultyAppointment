@extends('layouts.new')

@section('content')
@vite(['resources/js/student-side.js'])
@vite(['resources/js/request-list.js'])
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
            <span class=""></span>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="float-sm-right" style="list-style:none;">
              <li>This panel shows appointment reports and transaction details.</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner">
                    <h3 id="totalTransactions"></h3>

                    <p>Total Appointments</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag fa fa-database"></i>
                </div>
                <a href="{{ url('student/request-list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3 id="acceptedTransactions"></h3>

                    <p>Accepted Appointments</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars fa fa-check"></i>
                </div>
                <a href="{{ url('student/request-list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3 id="pendingTransactions"></h3>

                    <p>Pending Appointments</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add fa fa-hourglass-half"></i>
                </div>
                <a href="{{ url('student/request-list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3 id="declinedTransactions"></h3>

                    <p>Declined Appointments</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph fa fa-trash"></i>
                </div>
                <a href="{{ url('student/request-list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

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
                      <th style="width: 40px">Status</th>
                    </tr>
                  </thead>
                  <tbody id="request-list">
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


@endsection
