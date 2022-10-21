<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
          $role = Auth::user()->user_type; 
      
          switch ($role) {
            case 'faculty':
               return redirect('faculty');
               
               break;

            case 'student':
               return redirect('request-list');
               break;

            case 'admin':
               return redirect('admin');
               break;  
      
            default:
               return redirect('/'); 
               break;
          }
        }
        return $next($request);
      }
}
