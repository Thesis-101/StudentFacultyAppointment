@extends('layouts.app')

@section('content')
@vite(['resources/js/student-side.js'])
@vite(['resources/js/request-list.js'])

<div class="container mt-3">
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
                <h6 class="col m-auto card-subtitle text-muted">Cancelled/Declined Appointments</h6>
            </div>
            <div class="card-footer bg-danger">
            </div>
        </div>

        
        <div class="col-md-12  bg-white border border-light shadow-lg rounded mt-5">
            <div class="row">
                    <h5 class="pt-3 m-0  header-label ">
                    <svg class="bi me-2"  width="20px" height="20px"><use xlink:href="#transaction"/></svg>
                    Transaction List</h5>
                <div class="col-md-12 pt-3 ">
                    <table class="table bg-white shadow-sm container-fluid">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">Faculty Name</th>
                            <th scope="col">Designated Office</th>
                            <th scope="col">Time Slot</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody id="request-list">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
        <!-- <div class="col-md-8">
            <div class="welcome-search-container">
                <h1 class="text-center mb-3 header-label">Welcome!</h1>
                <form action="/faculty-list" method="get" class="row">
                    <div class="col-md-8">
                        <select name="department" id="department" class="form-select bg-white">
                            <option value="" selected>Select Department</option>
                            <option value="department 1">department 1</option>
                            <option value="department 2">department 2</option>
                            <option value="department 3">department 3</option>
                            <option value="department 4">department 4</option>
                            <option value="department 5">department 5</option>
                        </select>
                    </div>
                    <div class="col-md-3 m-auto">
                        <button type="submit" class="btn btn-md btn-primary px-5"><strong>Search</strong></button>
                    </div>
                </form>
            </div>
        </div> -->
    </div>
</div>
@endsection
