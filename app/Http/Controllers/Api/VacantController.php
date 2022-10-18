<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VacantDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PostRequest;

class VacantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('sanctum')->user()->userInstitution_id ;
        $allVacantDetails = VacantDetails::with('users')->where('userInstitutional_id', '=', $user)->get();
        return $allVacantDetails;
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
    public function store(PostRequest $request)
    {
        $data = VacantDetails::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Vacant Details Successfully Added",
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VacantDetails  $vacantDetails
     * @return \Illuminate\Http\Response
     */
    public function show(VacantDetails $vacantDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VacantDetails  $vacantDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(VacantDetails $vacantDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VacantDetails  $vacantDetails
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        try {
            $details = VacantDetails::find($id);
            if(!$details){
                return response()->json([
                    'message' => 'Record not found.'
                ],404);
            }

            $details->userInstitutional_id = $request->userInstitutional_id;
            $details->day = $request->day;
            $details->vacant_time = $request->vacant_time;
            $details->designated_office = $request->designated_office;

            $details->save();

            return response()->json([
                        'status' => true,
                        'message' => "Vacant Details Successfully Updated",
                    ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong!"
            ],500);
        }

    //     $vacantDetails->update($request->all());

    //     return response()->json([
    //         'status' => true,
    //         'message' => "Vacant Details Successfully Updated",
    //         'data' => $vacantDetails
    //     ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VacantDetails  $vacantDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacant = VacantDetails::find($id);
        if(!$vacant){
            return response()->json([
                'message'=>'Data Not Found.'
            ],404);
        }

        $vacant->delete();

        return response()->json([
            'status' => true,
            'message' => "Vacant Details Successfully Removed",
        ], 200);
    }
}
