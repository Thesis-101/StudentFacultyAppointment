@extends('layouts.app')

@section('content')
@vite(['resources/js/admin.js'])

<div class="container-lg py-5">
    <div class="row justify-content-center px-4">
        <div class="col px-0 card shadow-sm mx-1" style="width: 18rem;">
            <div class="card-body row text-center py-5">
                <h1 class="col m-auto card-title" id="totalTransactions"></h1>
                <h6 class="col m-auto card-subtitle text-muted">Total Appointments</h6>
            </div>
            <div class="card-footer bg-primary">
            </div>
        </div>
        <div class="col px-0 card shadow-sm mx-1" style="width: 18rem;">
            <div class="card-body row text-center py-5">
                <h1 class="col m-auto card-title" id="pendingTransactions"></h1>
                <h6 class="col m-auto card-subtitle text-muted">Pending Appointments</h6>
            </div>
            <div class="card-footer bg-warning">
            </div>
        </div>
        <div class="col px-0 card shadow-sm mx-1" style="width: 18rem;">
            <div class="card-body row text-center py-5">
                <h1 class="col m-auto card-title" id="acceptedTransactions"></h1>
                <h6 class="col m-auto card-subtitle text-muted ">Accepted Appointments</h6>
            </div>
            <div class="card-footer bg-success">
            </div>
        </div>
        <div class="col px-0 card shadow-sm mx-1" style="width: 18rem;">
            <div class="card-body row text-center py-5">
                <h1 class="col m-auto card-title" id="declinedTransactions"></h1>
                <h6 class="col m-auto card-subtitle text-muted">Declined Appointments</h6>
            </div>
            <div class="card-footer bg-danger">
            </div>
        </div>

        <h5 class="py-3 m-0 header-label mt-5">
                    <svg class="bi me-2"  width="20px" height="20px"><use xlink:href="#transaction"/></svg>
                    Transaction List</h5>

        <div class="col-md-12 bg-white">
            <div class="row">

                <table class="table bg-white shadow-sm container-fluid">
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

@endsection