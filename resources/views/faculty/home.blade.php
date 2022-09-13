@extends('layouts.app')


{{-- @section('home')
<a href="{{ url('faculty') }}" class="nav-link">Home</a>
@endsection --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="welcome-search-container row">
                <h1 class="text-center mb-3 header-label">Welcome!</h1>
                <a href="{{ url('faculty/appointments') }}" class="col-md-4 mx-auto btn btn-lg btn-primary">View Appointments</a>
            </div>
        </div>
    </div>
</div>
@endsection
