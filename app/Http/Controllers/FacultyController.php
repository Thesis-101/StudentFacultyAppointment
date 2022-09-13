<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index(){
        return view('faculty.home');
    }

    public function appointmentList(){
        return view('faculty.appointment-list');
    }

    public function appointmentHistory(){
        return view('faculty.appointment-history');
    }

    public function profile(){
        return view('faculty.profile');
    }
}
