@extends('layouts.app')

@section('content')
@vite(['resources/js/appointment-list.js'])
<div class="container-lg">
    <div class="row justify-content-center">
        <h5 class="mb-4 header-label">Appointment List</h5>
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
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="appointment-list">
            </tbody>
          </table>

    </div>
</div>

@endsection