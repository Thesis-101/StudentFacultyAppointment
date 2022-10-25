<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; 
use Hash;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function test()
    {
        return view('test');
    }

    public function updateProfile(Request $request){

        $userID = Auth::user()->id;

        $validated = Validator::make($request->all(),[
            'userInstitution_id' => ['requied', 'string', 'max:255'],
            'department' => ['requied', 'string', 'max:255'],
            'name' => ['requied', 'string', 'max:255'],
            'email' => ['requied', 'string', 'max:255'],
        ]);

    
            // $validate_img = Validator::make($request->all(),[
            //     'profile_img' => ['required', 'image', 'max:1000']
            // ]);

            #check if their is any error in image validation
            // if($validate_img->fails()){
            //     return response()->json(['code' => 400, 'msg' => $validate_img->errors()->first()]);
            // }

            #check if the request has profile image
            if($request->hasFile('profile_img')){
                $imagePath = 'storage/images/' . Auth::user()->profile_img;
                #check whether the image exists in the directory
                if (File::exists($imagePath)) {
                    #delete image
                    File::delete($imagePath);
                }
                $profile_image = $request->profile_img->store('images', 'public');
            }

            $schoolId =  $request->userInstitution_id;
            $department = $request->department;
            $name = $request->name;
            $email = $request->email;
            $profile = $profile_image ?? Auth::user()->profile_img;

            #update user info
            $data = [
                'userInstitution_id' => $schoolId,
                'department' => $department,
                'name' => $name,
                'email' => $email,
                'profile_img' => $profile,
            ];

            User::updateOrCreate(['id' => $userID], $data);
            return response()->json(['code' => 200, 'msg' => 'profile updated successfully.']);
    }

    public function changePassword(Request $request){
        
        $request->validate([
            'oldPassword' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if(!Hash::check($request->oldPassword, Auth::user()->password)){
            return response()->json(['code' => 400, 'msg' => 'Old Password Does not Match.']);
        }
        
        
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return response()->json(['code' => 200, 'msg' => 'Password Changed Successfully.']);
    }
}
