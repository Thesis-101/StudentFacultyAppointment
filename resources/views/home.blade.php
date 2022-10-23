@extends('layouts.app')

@section('content')
@vite(['resources/js/student-side.js'])
@vite(['resources/js/request-list.js'])
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-3 card shadow-sm mx-1" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title" id="totalTransactions"></h1>
                <h6 class="card-subtitle mb-2 text-muted text-end">Total Transactions</h6>
            </div>
        </div>
        <div class="col-3 card shadow-sm mx-1" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title" id="pendingTransactions"></h1>
                <h6 class="card-subtitle mb-2 text-muted text-end">Pending Transactions</h6>
            </div>
        </div>
        <div class="col-3 card shadow-sm mx-1" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title" id="acceptedTransactions"></h1>
                <h6 class="card-subtitle mb-2 text-muted text-end">Accepted Transactions</h6>
            </div>
        </div>
        <div class="col-3 card shadow-sm mx-1" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title" id="declinedTransactions"></h1>
                <h6 class="card-subtitle mb-2 text-muted text-end">Cancelled/Declined Transactions</h6>
            </div>
        </div>

        <h5 class="mb-3 mt-5 header-label">Transaction List</h5>

        <table class="table bg-white shadow-sm">
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
