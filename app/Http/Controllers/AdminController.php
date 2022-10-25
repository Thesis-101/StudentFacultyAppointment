<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Requests;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin');
    }

    public function profile(){
        return view('admin.profile');
    }

    public function reports(){
        return view('admin.reports');
    }

    public function recieveData()
    {
        $data = Requests::with('students')->get();
        return $data;
    }

    public function getStudent(){
        return view('admin.user-student-list');
    }

    public function getFaculty(){
        return view('admin.user-faculty-list');
    }

    public function faculty(){
        $data = User::where('user_type',"faculty")->get();

        return $data;
    }
}
