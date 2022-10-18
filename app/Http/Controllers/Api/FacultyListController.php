<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VacantDetails;
use Illuminate\Http\Request;

class FacultyListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allVacantDetails = VacantDetails::with('users')->get();
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, VacantDetails $vacantDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VacantDetails  $vacantDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(VacantDetails $vacantDetails)
    {
        //
    }
}
