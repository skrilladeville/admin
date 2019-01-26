<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\ProfilePatient;
use App\Http\Controllers\Controller;

class ProfilePatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile_patients= ProfilePatient::all();
        return $profile_patients; 
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        //
        $profile = ProfilePatient::where('user_id', $user_id)->first();
        return $profile;
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function patients($doctor_id)
    {
        //
        $patients = ProfilePatient::select('first_name', 'last_name', 'email')
        ->where('profile_doctors_id', $doctor_id)
        ->join('users', 'users.id', '=', 'user_id')
        ->get();
        return $patients;
    }

    public function patientsCount($doctor_id)
    {
        //
        $patients_count = ProfilePatient::where('profile_doctors_id', $doctor_id)
        ->count();
        return $patients_count;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
