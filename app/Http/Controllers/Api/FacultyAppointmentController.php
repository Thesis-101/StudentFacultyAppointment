<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Requests;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use App\Mail\MailNotify;
use Mail;

class FacultyAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('sanctum')->user()->userInstitution_id;
        $userType = auth('sanctum')->user()->user_type;
        if ($userType == "admin"){
            $data = Requests::with('students','vacantDetails')->get();
        }else{
            $data = Requests::with('students', 'vacantDetails')->where('faculty_id', '=', $user)->get();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requests  $requests
     * @return \Illuminate\Http\Response
     */
    public function show(Requests $requests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requests  $requests
     * @return \Illuminate\Http\Response
     */
    public function edit(Requests $requests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requests  $requests
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequest $request, $id)
    {
        $email_data = [
            'subject' => 'Appointment Email Notification',
            'body' => $request->message
        ];

        try {     
            Notification::create([
                'user_id' => $request->student_id,
                'message' => $request->message,
                'state' => $request->state
            ]);

            if($request->status != 'Ongoing' || $request->status != 'Completed'){
                Mail::to($request->student_email)->send(new MailNotify($email_data));
            }

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
     * @param  \App\Models\Requests  $requests
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests $requests)
    {
        //
    }
}
