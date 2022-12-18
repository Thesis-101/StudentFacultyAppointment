<?php

namespace App\Http\Controllers;

use App\Models\VacantDetails;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{
    public function index(){
        return view('faculty.home');
    }

    public function pendingAppointments(){
        return view('faculty.appointment-list');
    }

    public function acceptedAppointments(){
        return view('faculty.appointment-list-accepted');
    }

    public function ongoingAppointments(){
        return view('faculty.appointment-list-ongoing');
    }

    public function declinedAppointments(){
        return view('faculty.appointment-list-declined');
    }
    public function completedAppointments(){
        return view('faculty.appointment-list-completed');
    }

    public function appointmentHistory(){
        return view('faculty.appointment-history');
    }

    public function profile(){
        // $allVacantDetails = VacantDetails::all();

        return view('faculty.profile');
    }

    public function report(){
        return view('faculty.reports');
    }
    
    public function getWithRemarks(){

        $user = auth('sanctum')->user()->userInstitution_id;
        $userType = auth('sanctum')->user()->user_type;

        if ($userType == "admin"){
            $data = Requests::with('students','vacantDetails','remarks')->get();
        }else{
            $data = Requests::with('students', 'vacantDetails','remarks')->where('faculty_id', '=', $user)->get();
        }

        return $data;
    }
}
