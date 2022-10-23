@extends('layouts.app')

@section('content')
@vite(['resources/js/request-list.js'])
<div class="container-lg py-5">
    <div class="row justify-content-center">
        <div class="row mb-4">
            <h5 class="mb-5 header-label">Appointment List</h5>
            <div class="col-md-4">
                <div class="row">
                    <label for="filter" class="col-form-lable col-md-2 my-auto text-end">Filter:</label>
                    <div class="col-md-8">
                        <select name="filter" id="filter" class="form-select">
                            <option value="" selected>Department</option>
                            <option value="">department 1</option>
                            <option value="">department 2</option>
                            <option value="">department 3</option>
                            <option value="">department 4</option>
                            <option value="">department 5</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    
        <table class="table bg-white shadow-sm">
            <thead class="table-dark">
              <tr>
                <th scope="col">Faculty Name</th>
                <th scope="col">Designated Office</th>
                <th scope="col">Time Slot</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="appointmentList">
            </tbody>
        </table>

    </div>
</div>

@endsection