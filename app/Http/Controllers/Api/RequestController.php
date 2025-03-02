<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Requests;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Remarks;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Support\Facades\Auth;
use App\Mail\MailNotify;
use Mail;

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
        $user = auth('sanctum')->user()->name;

        $email_data = [
            'subject' => 'Appointment Email Notification',
            'body' => 'New Request is Available.',
            'status' => 'Pending',
            'name' => $user,
            'date-time' => $request->date." ".$request->time,
            'office' => $request->office,
            'remarks' => 'None'
        ];

        $data = Requests::create($request->all());
            Notification::create([
                                    'user_id' => $request->faculty_id,
                                    'message' => 'New Request is Available.'
                                ]);
            
            Remarks::create([
                                    'requests_id' => $data->id,
                                    'faculty_id' => $request->faculty_id,
                                    'student_id' => $request->requesitor_id,
                                    'remarks' => 'None'
                                ]);
            
            Mail::to($request->student_email)->send(new MailNotify($email_data));
    
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
    public function update(AppointmentRequest $request, $id)
    {
        try {
            $data = Requests::find($id);
            if(!$data){
                return response()->json([
                    'message' => 'Record not found.'
                ],404);
            }

            $data->vacant_id = $request->vacant_id;
            $data->requesitor_id = $request->requesitor_id;
            $data->faculty_id = $request->faculty_id;
            $data->request_type = $request->request_type;
            $data->attendee_type = $request->attendee_type;
            $data->day = $request->day;
            $data->time = $request->time;
            $data->date = $request->date;
            $data->status = $request->status;

            $data->save();

            return response()->json([
                        'status' => true,
                        'message' => "Vacant Details Successfully Updated",
                    ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong!"
            ],500);
        }
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
