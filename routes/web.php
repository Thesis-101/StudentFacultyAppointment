<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentAppointmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

Auth::routes();

Route::get('home', [HomeController::class, 'index']);
Route::post('/updateProfile', [HomeController::class, 'updateProfile'])->name('user.profile');
Route::post('/change-password', [HomeController::class, 'changePassword']);

//Faculty

Route::group(['prefix' => 'faculty', 'middleware' => ['role:faculty','auth']], function () {
    Route::get('/',[FacultyController::class, 'index']);
    Route::get('appointments',[FacultyController::class, 'appointmentList']);
    Route::get('history',[FacultyController::class, 'appointmentHistory']);
    Route::get('profile', [FacultyController::class, 'profile']);
    Route::get('report', [FacultyController::class, 'report']);
    Route::get('report-remarks', [FacultyController::class, 'getWithRemarks']);
});


//Student
Route::group(['prefix' => 'student', 'middleware' => ['role:student','auth']], function () {
    Route::get('/', [StudentAppointmentController::class, 'index']);
    Route::get('faculty-list', [StudentAppointmentController::class, 'facultyList']);
    Route::get('request-list', [StudentAppointmentController::class, 'requestList']);
    Route::get('profile', [StudentAppointmentController::class, 'profile']);
    Route::get('getFaculty', [StudentAppointmentController::class, 'getFaculty']);
    Route::get('load-requests', [StudentAppointmentController::class, 'getAllRequest']);
});

//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin','auth']], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('profile', [AdminController::class, 'profile']);
    Route::get('reports', [AdminController::class, 'reports']);
    Route::get('allRequest', [AdminController::class, 'recieveData']);
    Route::get('student-list', [AdminController::class, 'getStudent']);
    Route::get('faculty-list', [AdminController::class, 'getFaculty']);
    Route::get('faculty', [AdminController::class, 'faculty']);
    Route::get('student', [AdminController::class, 'student']);
    Route::put('update/{id}', [AdminController::class, 'update']);
    Route::delete('delete/{id}', [AdminController::class, 'delete']);
    Route::delete('deleteRequest/{id}', [AdminController::class, 'deleteRequest']);
    Route::delete('deleteDepartment/{id}', [AdminController::class, 'deleteDepartment']);
    Route::post('addUser', [AdminController::class, 'addUser']);
    Route::get('department-setup', [AdminController::class, 'getDepartment']);
    Route::post('department-setup', [AdminController::class, 'addDepartment']);
    Route::get('report-remarks', [FacultyController::class, 'getWithRemarks']);
    Route::post('restore-default/{id}', [AdminController::class, 'restorePassword']);
    Route::get('all-users', [AdminController::class, 'getAllUsers']);
});

//Student & Faculty
Route::get('notification', [StudentAppointmentController::class, 'notification'])->middleware('auth');
Route::get('loadAll', [AdminController::class, 'loadDepartments']);


//User
// Route::group(['middleware' => ['auth']], function () { 
//     Route::get('profile', 'FacultyController@profile');
// });


//Route::post('create',[RegisterController::class, 'create'])->name('register');
