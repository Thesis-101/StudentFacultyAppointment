<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class StudentAppointmentController extends Controller
{
    public function facultyList(){
        
        return view('faculty-list');
    }

    public function requestList(){
        return view('request-list');
    }

    public function notification(){
        $user = auth('sanctum')->user()->userInstitution_id;
        Notification::where('user_id',$user)->update(['status' => 'seen']);
        return view('notification');
    }

    public function profile(){
        return view('profile');
    }
}
