@extends('layouts.app')

@section('content')
@vite(['resources/js/notifications.js'])
<div class="container">
    <div class="row justify-content-center px-4">
        
        <!-- <div class="col-md-8">
            <h4 class="header-label text-start mb-4 offset-3">Notification</h4>
            
            <div class="notification-list shadow-sm bg-white form-container m-auto">
            </div>
        </div> -->

        <div class="col-md-12  border shadow-sm mt-5 bg-white">
            <div class="row">
                <h5 class="py-3 m-0 header-label ">
                    <svg class="bi me-2 "   width="20px" height="20px"><use xlink:href="#notify"/></svg>
                    Notifications</h5>
                <hr>
               <div class="table-wrapper">
                    <table class="table bg-white shadow-sm container-fluid ">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Message</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody id="notification-list">
                        </tbody>
                    </table>
               </div>
                
            </div>
            <div class="row">
                <div class="col-md-12 text-white">asd</div>
            </div>
        </div>
    </div>
</div>
@endsection
