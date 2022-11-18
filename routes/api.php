<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\VacantController;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\FacultyAppointmentController;
use App\Http\Controllers\Api\FacultyListController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\RemarksController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Auth::routes();

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('vacant', VacantController::class);
Route::apiResource('schedules', FacultyListController::class);
Route::apiResource('add-vacant', VacantController::class);
Route::apiResource('appointments', FacultyAppointmentController::class);
Route::apiResource('request', RequestController::class);
Route::apiResource('notifications', NotificationController::class);
Route::apiResource('remarks', RemarksController::class);
