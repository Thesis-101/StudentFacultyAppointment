<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentAppointmentController;
use App\Http\Controllers\FacultyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('home', [HomeController::class, 'index']);
Route::get('test', [HomeController::class, 'test']);

//Faculty

Route::group(['prefix' => 'faculty', 'middleware' => ['role:faculty']], function () {
    Route::get('/',[FacultyController::class, 'index']);
    Route::get('appointments',[FacultyController::class, 'appointmentList']);
    Route::get('history',[FacultyController::class, 'appointmentHistory']);
    Route::get('profile', [FacultyController::class, 'profile']);
});


//Student
Route::get('faculty-list', [StudentAppointmentController::class, 'facultyList']);
Route::get('request-list', [StudentAppointmentController::class, 'requestList']);
Route::get('profile', [StudentAppointmentController::class, 'profile']);

//Student & Faculty
Route::get('notification', [StudentAppointmentController::class, 'notification']);


//User
// Route::group(['middleware' => ['auth']], function () { 
//     Route::get('profile', 'FacultyController@profile');
// });


//Route::post('create',[RegisterController::class, 'create'])->name('register');
