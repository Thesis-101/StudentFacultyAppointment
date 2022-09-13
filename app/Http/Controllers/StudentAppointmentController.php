<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentAppointmentController extends Controller
{
    public function facultyList(){
        return view('faculty-list');
    }

    public function requestList(){
        return view('request-list');
    }

    public function notification(){
        return view('notification');
    }

    public function profile(){
        return view('profile');
    }
}
