<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    // protected function authenticated(Request $request, $user)
    // {
    //     if(Auth::check() && Auth::user()->role->user_type=='admin') {
    //         return redirect()->route('admin');
    //     } else if (Auth::check() && Auth::user()->role->user_type=='faculty') {
    //         return redirect()->route('faculty');
    //     }else if (Auth::check() && Auth::user()->role->user_type=='faculty') {
    //       return redirect()->route('student');
    //     }
    //     return redirect('/');
    // }

    public function redirectTo() {
        $role = Auth::user()->user_type; 
        switch ($role) {
          case 'faculty':
            return 'faculty';
            break;

          case 'student':
            return 'student';
            break;
            
          case 'admin':
            return 'admin';
            break; 
      
          default:
            return '/'; 
          break;
        }
      }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
