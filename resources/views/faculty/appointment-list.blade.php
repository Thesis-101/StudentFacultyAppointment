@extends('layouts.app')

@section('content')
@vite(['resources/js/appointment-list.js'])
<div class="container-lg">
    <div class="row justify-content-center">

        <!-- Modal -->
        <div class="modal fade" id="addForm" tabindex="-1" aria-labelledby="addFormLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reschedule Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="row mb-2">
                    <label for="day" class="col-form-label col-md-3">Day:</label>
                    <div class="col-md-9">
                      <select name="day" id="day" class="form-select" required>
                        <option value=""></option>
                        <option value="monday" >Monday</option>
                        <option value="tuesday" >Tuesday</option>
                        <option value="wednesday" >Wednesday</option>
                        <option value="thursday" >Thursday</option>
                        <option value="friday" >Friday</option>
                      </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="time1" class="col-form-label col-md-3">Time:</label>
                    <div class="col-md-4">
                      <input class="form-control" type="time" name="time1" id="time1" >
                    </div>
                    <label for="time2" class="col-form-label col-md-1">To</label>
                    <div class="col-md-4">
                      <input class="form-control" type="time" name="time2" id="time2">
                    </div>
                </div>

                <div class="row mb-2">
                  <label for="date" class="col-form-label col-md-3">Date:</label>
                  <div class="col-md-9">
                    <input class="form-control" type="date" name="date" id="date">
                  </div>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
              </div>
              <div class="modal-footer apiBtn">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="reschedule" type="button" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="reasonForm" tabindex="-1" aria-labelledby="reasonFormLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reschedule Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="row mb-2">
                  <label for="reason" class="col-form-label col-md-3">Reason:</label>
                  <div class="col-md-9">
                    <textarea  class="form-control" name="reason" id="reason" ></textarea>
                  </div>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
              </div>
              <div class="modal-footer apiBtn">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="decline" type="button" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>




        <h5 class="mb-4 header-label">Appointment List</h5>
        <table class="table bg-white shadow-sm">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID Number</th>
                <th scope="col">Student Name</th>
                <th scope="col">Department</th>
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