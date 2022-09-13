@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <h4 class="header-label text-start mb-4 offset-3">Notification</h4>

            <div class="shadow-sm bg-white form-container m-auto">
                <div class="row mb-0 notification-msg">
                    <div class="col-md-12 bg-light pt-3">
                        <h6 class="text-bg-success py-1 px-1">Your request has been approved.</h6>
                        <p>08-09-2022 22:18</p>
                    </div>
                </div>
                <div class="row mb-0 notification-msg">
                    <div class="col-md-12 bg-light pt-3">
                        <h6 class="text-bg-danger py-1 px-1">Your request has been declined.</h6>
                        <p>08-09-2022 22:18</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
