@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="welcome-search-container">
                <h1 class="text-center mb-3 header-label">Welcome!</h1>
                <form action="" method="get" class="row">
                    <div class="col-md-5">
                        <select name="department" id="department" class="form-select bg-white">
                            <option value="" selected>Select Department</option>
                            <option value="">department 1</option>
                            <option value="">department 2</option>
                            <option value="">department 3</option>
                            <option value="">department 4</option>
                            <option value="">department 5</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="time" name="time_slot" id="time_slot" class="form-control bg-white">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="date" id="date" class="form-control bg-white">
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-md btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
