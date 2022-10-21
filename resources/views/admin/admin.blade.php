@extends('layouts.app')

@section('content')
@vite(['resources/js/admin.js'])
<div class="container-lg py-5">
    <div class="row justify-content-center">
        <div class="col-md-3 card shadow-sm mx-1" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title" id="totalTransactions"></h1>
                <h6 class="card-subtitle mb-2 text-muted text-end">Total Transactions</h6>
            </div>
        </div>
        <div class="col-md-3 card shadow-sm mx-1" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title" id="pendingTransactions"></h1>
                <h6 class="card-subtitle mb-2 text-muted text-end">Pending Transactions</h6>
            </div>
        </div>
        <div class="col-md-3 card shadow-sm mx-1" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title" id="acceptedTransactions"></h1>
                <h6 class="card-subtitle mb-2 text-muted text-end">Accepted Transactions</h6>
            </div>
        </div>
        <div class="col-md-3 card shadow-sm mx-1" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title" id="declinedTransactions"></h1>
                <h6 class="card-subtitle mb-2 text-muted text-end">Declined Transactions</h6>
            </div>
        </div>

        <h5 class="mb-3 mt-5 header-label">Transaction List</h5>

        <table class="table bg-white shadow-sm">
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

@endsection