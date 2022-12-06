<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Requests;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;

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
        $data = Requests::all();
        return $data;
    }

    public function getStudent(){
        return view('admin.user-student-list');
    }

    public function getFaculty(){
        $users = User::orderBy('id','desc')->get();
        return view('admin.user-faculty-list',['userList' => $users]);
    }

    public function getAllUsers(){
        $users = User::all();
        return $users;
    }

    public function faculty(){
        $data = User::where('user_type',"faculty")->get();

        return $data;
    }

    public function delete($id)
    {
        $data = User::find($id);
        if(!$data){
            return response()->json([
                'message'=>'Data Not Found.'
            ],404);
        }

        $data->delete();

        return response()->json([
            'status' => true,
            'message' => "User Successfully Removed",
        ], 200);
    }

    public function deleteRequest($id)
    {
        $data = Requests::find($id);
        if(!$data){
            return response()->json([
                'message'=>'Data Not Found.'
            ],404);
        }

        $data->delete();

        return response()->json([
            'status' => true,
            'message' => "Data Successfully Removed",
        ], 200);
    }

    public function addUser(Request $request){

        $data = User::create([
            'userInstitution_id' =>  $request->userInstitution_id,
            'department' =>  $request->department,
            'name' =>  $request->name,
            'user_type' =>  $request->user_type,
            'email' =>  $request->email,
            'profile_img' => 'images/default-avatar.jpg',
            'password' => Hash::make( $request->password),
        ]);

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => "User Successfully Added",
        ], 200);
    }

    public function getDepartment(){
        return view('admin.department-setup');
    }

    public function addDepartment(Request $request){


        $data = Department::create($request->all());

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => "A Department is Successfully Added",
        ], 200);
    }

    public function loadDepartments(){
        $data = Department::all();

        return $data;
    }

    public function deleteDepartment($id)
    {
        $data = Department::find($id);
        if(!$data){
            return response()->json([
                'message'=>'Data Not Found.'
            ],404);
        }

        $data->delete();

        return response()->json([
            'status' => true,
            'message' => "Department Successfully Removed",
        ], 200);
    }
    

    public function update(Request $request, $id){
        try {
            $details = Department::find($id);
            if(!$details){
                return response()->json([
                    'message' => 'Record not found.'
                ],404);
            }

            $details->department = $request->department;

            $details->save();

            return response()->json([
                        'status' => true,
                        'message' => "Department Name Successfully Updated",
                    ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong!"
            ],500);
        }
    }

    public function restorePassword(Request $request, $id){
        try {

            User::whereId($id)->update([
                'password' => Hash::make($request->default_password)
            ]);

            return response()->json([
                        'status' => true,
                        'message' => "Password Restored.",
                    ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong!"
            ],500);
        }
    }
}
