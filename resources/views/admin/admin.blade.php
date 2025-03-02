@extends('layouts.new')

@section('content')
@vite(['resources/js/admin.js'])

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
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                        <tr>
                            <th scope="col">Student Name</th>
                            <th scope="col">Faculty Name</th>
                            <th scope="col">Day</th>
                            <th scope="col">Designated Office</th>
                            <th scope="col">Time Slot</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="transaction-list">
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

<!-- <div class="container-lg mt-3">
    <div class="row justify-content-center px-4">

        <h2 class=" m-0 mb-5 header-label">
            Dashboard
            <svg class="bi me-2"  width="25px" height="25px"><use xlink:href="#description-pointer"/></svg>
            <span class="h5">This panel shows appointment reports and transaction details.</span>
        </h2>

        <div class="col px-0 card shadow mx-1" style="width: 18rem;">
            <div class="card-body row text-center py-5">
                <h1 class="col m-auto card-title" id="totalTransactions"></h1>
                <h6 class="col m-auto card-subtitle text-muted">Total Appointments</h6>
            </div>
            <div class="card-footer bg-primary">
            </div>
        </div>
        <div class="col px-0 card shadow mx-1" style="width: 18rem;">
            <div class="card-body row text-center py-5">
                <h1 class="col m-auto card-title" id="pendingTransactions"></h1>
                <h6 class="col m-auto card-subtitle text-muted">Pending Appointments</h6>
            </div>
            <div class="card-footer bg-warning">
            </div>
        </div>
        <div class="col px-0 card shadow mx-1" style="width: 18rem;">
            <div class="card-body row text-center py-5">
                <h1 class="col m-auto card-title" id="acceptedTransactions"></h1>
                <h6 class="col m-auto card-subtitle text-muted ">Accepted Appointments</h6>
            </div>
            <div class="card-footer bg-success">
            </div>
        </div>
        <div class="col px-0 card shadow mx-1" style="width: 18rem;">
            <div class="card-body row text-center py-5">
                <h1 class="col m-auto card-title" id="declinedTransactions"></h1>
                <h6 class="col m-auto card-subtitle text-muted">Declined Appointments</h6>
            </div>
            <div class="card-footer bg-danger">
            </div>
        </div>

                

        <div class="col-md-12 bg-white border border-light shadow-lg rounded mt-5">
            <div class="row">
                <h5 class="pt-3 m-0 header-label">
                    <svg class="bi me-2"  width="20px" height="20px"><use xlink:href="#transaction"/></svg>
                    Transaction List</h5>
                <div class="col-md-12 pt-3 ">
                <table class="table bg-white  container-fluid shadow-sm">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Student Name</th>
                            <th scope="col">Faculty Name</th>
                            <th scope="col">Day</th>
                            <th scope="col">Designated Office</th>
                            <th scope="col">Time Slot</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="transaction-list">
                    </tbody>
                </table>
                </div>
                
            </div>
        </div>


    </div>
</div> -->

@endsection