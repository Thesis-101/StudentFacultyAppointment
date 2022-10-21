@extends('layouts.app')

@section('content')
@vite(['resources/js/student-side.js'])
<div class="container-lg py-5">
    <div class="row justify-content-center">
        <h5 class="mb-5 header-label">Faculty List</h5>
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="row">
                    <label for="filter" class="col-form-lable col-md-2 my-auto text-end">Filter:</label>
                    <div class="col-md-8">
                        <select name="filter" id="filter" class="form-select">
                            <option value="" selected>All</option>
                            <option value="department 1">department 1</option>
                            <option value="department 2">department 2</option>
                            <option value="department 3">department 3</option>
                            <option value="department 4">department 4</option>
                            <option value="department 5">department 5</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addForm" tabindex="-1" aria-labelledby="addFormLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Set Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="row mb-2">
                  <label for="idNumber" class="col-form-label col-md-3">ID Number:</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="idNumber" id="idNumber">
                  </div>
                </div>

                <div class="row mb-2">
                  <label for="day" class="col-form-label col-md-3">Day:</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="day" id="day">
                  </div>
                </div>

                <div class="row mb-2">
                  <label for="time" class="col-form-label col-md-3">Vacant Time:</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="time" id="time">
                  </div>
                </div>

                <div class="row mb-2">
                  <label for="office" class="col-form-label col-md-3">Office:</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="office" id="office">
                  </div>
                </div>

                <div class="row mb-2">
                  <label for="date" class="col-form-label col-md-3">Date:</label>
                  <div class="col-md-9">
                    <input class="form-control" type="date" name="date" id="date">
                  </div>
                </div>

                <div class="row mb-2">
                  <label for="attendee" class="col-form-label col-md-3">Request Type:</label>
                  <div class="col-md-9" >
                    <input type="text" name="request" id="request" class="form-control">
                  </div>
                </div>

                <div class="row mb-2">
                  <label for="attendee" class="col-form-label col-md-3">Attendee Type:</label>
                  <div class="col-md-9">
                    <select name="attendee" id="attendee" class="form-select">
                      <option value="" selected>--------</option>
                      <option value="individual" >Individual</option>
                      <option value="group" >Group</option>
                    </select>
                  </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
              </div>
              <div class="modal-footer apiBtn">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="appoint" type="button" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>

        <input type="text" name="requesitor" id="requesitor" value="{{ Auth::user()->id }}" hidden>

        <table class="table bg-white shadow-sm">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID Number</th>
                <th scope="col">Faculty Name</th>
                <th scope="col">Day</th>
                <th scope="col">Designated Office</th>
                <th scope="col">Time Slot</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="schedule-list">
            </tbody>
          </table>

    </div>
</div>

@endsection