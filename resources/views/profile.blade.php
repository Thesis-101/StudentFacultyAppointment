@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <!-- <h4 class="header-label text-start mb-4 offset-3">Profile</h4> -->
            <div class="shadow-sm bg-white form-container m-auto">
                <div class="user-details text-center">
                    <img width="100px" height="100px" class="border-rounded " src="{{asset('storage/images/default-avatar.jpg')}}" alt="Profile Pic">
                    <h5 class="text-center mb-0 mt-2 header-label">{{ Auth::user()->name }}</h5>
                    <p class="text-center mb-3">{{ Auth::user()->userInstitution_id }}</p>
                </div>
                <hr>
                <div class="other-details mb-5">
                    <p class="mb-1">User Type: <span class="user-type">Student</span></p>
                    <p>Email: <span class="user-email">{{Auth::user()->email}}</span></p>
                </div>
                <div class="row">
                    <button class="btn btn-md btn-primary col-md-6 mx-auto mb-2">Edit Profile</button>
                </div>
                <div class="row">
                    <button class="btn btn-md btn-primary col-md-6 mx-auto">Change Password</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
