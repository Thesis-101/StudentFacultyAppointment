@extends('layouts.app')

@section('content')
@vite(['resources/js/history.js'])
<div class="container-lg">
    <div class="row justify-content-center">
        <h5 class="mb-4 header-label">Appointment History</h5>
        <table class="table bg-white shadow-sm">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID Number</th>
                <th scope="col">Student Name</th>
                <th scope="col">Request Type</th>
                <th scope="col">Attendee Type</th>
                <th scope="col">Day</th>
                <th scope="col">Time Slot</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody id="history-list">
            </tbody>
          </table>

    </div>
</div>

@endsection