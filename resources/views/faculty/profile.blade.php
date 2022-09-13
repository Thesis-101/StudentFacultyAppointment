@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="header-label text-start mb-4 offset-3">Profile</h4>
            <div class="shadow-sm bg-white form-container mx-auto mb-5">
                <div class="user-details">
                    <h5 class="text-center mb-0 mt-5 header-label">John Doe</h5>
                    <p class="text-center mb-5">18-A-01609</p>
                </div>
                <div class="other-details mb-5">
                    <p class="mb-1">User Type: <span class="user-type">Student</span></p>
                    <p>Email: <span class="user-email">test@gmail.com</span></p>
                </div>
                <div class="row">
                    <button class="btn btn-md btn-primary col-md-4 mx-auto">Edit Profile</button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addForm" tabindex="-1" aria-labelledby="addFormLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="row mb-2">
                  <label for="day" class="col-form-label col-md-3">Day:</label>
                  <div class="col-md-9">
                    <select name="day" id="day" class="form-select">
                      <option value="" selected>Ex. Monday</option>
                      <option value="monday" >Monday</option>
                      <option value="tuesday" >Tuesday</option>
                      <option value="wednesday" >Wednesday</option>
                      <option value="thursday" >Thursday</option>
                      <option value="friday" >Friday</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-2">
                  <label for="time1" class="col-form-label col-md-3">Time Slot:</label>
                  <div class="col-md-4">
                    <input class="form-control" type="time" name="time1" id="time1">
                  </div>
                  <label for="time2" class="col-form-label col-md-1">To</label>
                  <div class="col-md-4">
                    <input class="form-control" type="time" name="time2" id="time2">
                  </div>
                </div>

                <div class="row mb-2">
                  <label for="office" class="col-form-label col-md-3">Office:</label>
                  <div class="col-md-9">
                    <select name="office" id="office" class="form-select">
                      <option value="" selected>Department</option>
                      <option value="monday" >Department 1</option>
                      <option value="tuesday" >Department 2</option>
                      <option value="wednesday" >Department 3</option>
                      <option value="thursday" >Department 4</option>
                      <option value="friday" >Department 5</option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-3 mt-5">
            <h4 class="header-label text-start my-auto col-md-9">Vacant Time</h4>
            <button class="btn btn-md btn-primary col-md-3" data-bs-toggle="modal" data-bs-target="#addForm">Add Time Slot</button>
        </div>
        <table class="table bg-white shadow-sm">
            <thead class="table-dark">
              <tr>
                <th scope="col">Day</th>
                <th scope="col">Time Slot</th>
                <th scope="col">Designated Office</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Monday</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary px-3">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger px-3">Delete</a>
                </td>
              </tr>
              <tr>
                <th scope="row">Tuesday</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary px-3">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger px-3">Delete</a>
                </td>
              </tr>
              <tr>
                <th scope="row">Wednesday</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary px-3">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger px-3">Delete</a>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection
