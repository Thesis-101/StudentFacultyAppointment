@extends('layouts.app')

@section('content')

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
                <th scope="col">Time Slot</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>08-05-1999</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary px-3">Accept</a>
                    <a href="#" class="btn btn-sm btn-danger px-3">Decline</a>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>08-05-1999</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary px-3">Accept</a>
                    <a href="#" class="btn btn-sm btn-danger px-3">Decline</a>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>08-05-1999</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary px-3">Accept</a>
                    <a href="#" class="btn btn-sm btn-danger px-3">Decline</a>
                </td>
              </tr>
            </tbody>
          </table>

    </div>
</div>

@endsection