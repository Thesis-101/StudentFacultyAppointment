<?php

namespace App\Http\Controllers;

use App\Models\VacantDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $allVacantDetails = VacantDetails::all();

        return view('faculty.profile');
    }
}
