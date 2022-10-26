@extends('layouts.app')

@section('content')
@vite(['resources/js/appointment-list.js'])
@vite(['resources/js/history.js'])
<div class="container-lg mt-3">
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
                <table class="table bg-white shadow-sm container-fluid">
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
                    <tbody id="history-list">
                    </tbody>
                </table>
            </div>
                
            </div>
        </div>
    </div>
</div>

@endsection