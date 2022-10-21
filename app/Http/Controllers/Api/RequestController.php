<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Requests;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth('sanctum')->user()->id;
        $userType = auth('sanctum')->user()->user_type;
        if($userType == "admin"){
            $data = Requests::with('users','students','vacantDetails')->get();
        }else{
            $data = Requests::with('users','vacantDetails')->where('requesitor_id', '=', $userId)->get();
        }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        $data = Requests::create($request->all());
        Notification::create([
                                'user_id' => $request->faculty_id,
                                'message' => 'New Request is Available.'
                            ]);

        return response()->json([
            'status' => true,
            'message' => "Appointment Successfully Added",
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestModel  $requestModel
     * @return \Illuminate\Http\Response
     */
    public function show(RequestModel $requestModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestModel  $requestModel
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestModel $requestModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestModel  $requestModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestModel $requestModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestModel  $requestModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestModel $requestModel)
    {
        //
    }
}
