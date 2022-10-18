@extends('layouts.app')

@section('content')
@vite(['resources/js/notifications.js'])
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <h4 class="header-label text-start mb-4 offset-3">Notification</h4>

            <div class="notification-list shadow-sm bg-white form-container m-auto">
            </div>
        </div>
    </div>
</div>
@endsection
