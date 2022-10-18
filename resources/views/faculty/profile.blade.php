@extends('layouts.app')

@section('content')
@vite(['resources/js/vacant.js'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="header-label text-start mb-4 offset-3">Profile</h4>
            <div class="shadow-sm bg-white form-container mx-auto mb-5">
                <div class="user-details">
                    <h5 class="text-center mb-0 mt-5 header-label">{{ Auth::user()->name }}</h5>
                    <p class="text-center mb-5">{{ Auth::user()->userInstitution_id }}</p>
                </div>
                <div class="other-details mb-5">
                    <p class="mb-1">User Type: <span class="user-type">{{ Auth::user()->user_type}}</span></p>
                    <p>Email: <span class="user-email">{{ Auth::user()->email}}</span></p>
                </div>
                <div class="row">
                    <button class="btn btn-md btn-primary col-md-4 mx-auto">Edit Profile</button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <!-- <form method="post"> -->
          <div class="modal fade" id="addForm" tabindex="-1" aria-labelledby="addFormLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input id="userInstitution_id" type="text" value="{{ Auth::user()->userInstitution_id }}" hidden>
                  <div class="row mb-2">
                    <label for="day" class="col-form-label col-md-3">Day:</label>
                    <div class="col-md-9">
                      <select name="day" id="day" class="form-select" required>
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
                      <input class="form-control" type="time" name="time1" id="time1" >
                    </div>
                    <label for="time2" class="col-form-label col-md-1">To</label>
                    <div class="col-md-4">
                      <input class="form-control" type="time" name="time2" id="time2">
                    </div>
                  </div>

                  <div class="row mb-2">
                    <label for="office" class="col-form-label col-md-3">Office:</label>
                    <div class="col-md-9">
                      <select name="office" id="office" class="form-select" >
                        <option value="department 1" >Department 1</option>
                        <option value="department 2" >Department 2</option>
                        <option value="department 3" >Department 3</option>
                        <option value="department 4" >Department 4</option>
                        <option value="department 5" >Department 5</option>
                      </select>
                    </div>
                  </div>

                </div>
                <div class="modal-footer" id="apiBtn">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="target-bttn btn btn-primary" id="newVacant">Save</button>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="PUT">
        <!-- </form> -->
        
        <div class="row mb-3 mt-5">
            <h4 class="header-label text-start my-auto col-md-9">Vacant Time</h4>
            <button id="add" class="btn btn-md btn-primary col-md-3" data-bs-toggle="modal" data-bs-target="#addForm">Add Time Slot</button>
        </div>
        <table class="table bg-white shadow-sm">
          <input id="lastItem" hidden></input>
            <thead class="table-dark ">
              <tr>
                <th scope="col">Day</th>
                <th scope="col">Time Slot</th>
                <th scope="col">Designated Office</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="vacant_list">
            </tbody>
          </table>
    </div>
</div>
@endsection
