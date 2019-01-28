<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $bookings = DB::table('bookings')
        ->select('bookings.*', 'name', 'description', 'duration', 
        'first_name as doctor_fname', 'last_name as doctor_fname', 'profession', 'start_datetime', 'end_datetime')
        ->join('bookings_services', 'bookings_services_id', '=', 'bookings_services.id')
        ->join('bookings_service_providers', 'bookings_service_providers.id', '=', 'bookings_services.bookings_service_providers_id')
        ->join ('profile_doctors', 'profile_doctors.user_id', '=', 'bookings_service_providers.profile_doctors_id')
        ->where('bookings.user_id', $user_id)->get();

        return $bookings;
    }
    

    public function showAllByPatient($patient_id)
    {
        $bookings = DB::table('bookings')
        ->select('bookings.*', 'name', 'description', 'duration', 
        'first_name', 'last_name', 'profession', 'start_datetime', 'end_datetime')
        ->join('bookings_services', 'bookings_services_id', '=', 'bookings_services.id')
        ->join('bookings_service_providers', 'bookings_service_providers.id', '=', 'bookings_services.bookings_service_providers_id')
        ->join ('profile_doctors', 'profile_doctors.user_id', '=', 'bookings_service_providers.profile_doctors_id')
        ->orderBy('start_datetime', 'asc')
        ->where('bookings.user_id', $patient_id)->get();

        return $bookings;
    }

    public function showAllByDoctor($doctor_id)
    {
        $bookings = DB::table('bookings')
        ->select('bookings.*', 'name', 'description', 'duration', 
        'first_name', 'last_name', 'start_datetime', 'end_datetime')
        ->join('bookings_services', 'bookings_services_id', '=', 'bookings_services.id')
        ->join('bookings_service_providers', 'bookings_service_providers.id', '=', 'bookings_services.bookings_service_providers_id')
        ->join ('profile_patients', 'profile_patients.user_id', '=', 'bookings.user_id')
        ->orderBy('start_datetime', 'asc')
        ->where('bookings_service_providers.profile_doctors_id', $doctor_id)->get();

        return $bookings;
    }

    public function patientRecentBooking($patient_id)
    {
        $bookings = (array)DB::table('bookings')
        ->select('bookings.*', 'name', 'description', 'duration', 
        'first_name', 'last_name', 'profession', 'start_datetime', 'end_datetime')
        ->join('bookings_services', 'bookings_services_id', '=', 'bookings_services.id')
        ->join('bookings_service_providers', 'bookings_service_providers.id', '=', 'bookings_services.bookings_service_providers_id')
        ->join ('profile_doctors', 'profile_doctors.user_id', '=', 'bookings_service_providers.profile_doctors_id')
        ->orderBy('start_datetime', 'asc')
        ->where([
            ['bookings.user_id', '=', $patient_id],
            ['bookings.status', '=', '0']
        ])->orderBy('start_datetime', 'asc')->first();
        return $bookings;
    }

    public function doctorRecentBooking($doctor_id)
    {
        $bookings = (array)DB::table('bookings')
        ->select('bookings.*', 'name', 'description', 'duration', 
        'first_name', 'last_name','start_datetime', 'end_datetime')
        ->join('bookings_services', 'bookings_services_id', '=', 'bookings_services.id')
        ->join('bookings_service_providers', 'bookings_service_providers.id', '=', 'bookings_services.bookings_service_providers_id')
        ->join ('profile_patients', 'profile_patients.user_id', '=', 'bookings.user_id')
        ->where([
            ['bookings_service_providers.profile_doctors_id', '=', $doctor_id],
            ['bookings.status', '=', '0']
        ])->orderBy('start_datetime', 'asc')->first();

        return $bookings;
    }

    public function bookingsCount($doctor_id)
    {
        $bookings_count = DB::table('bookings')
        ->select('bookings.*', 'name', 'description', 'duration', 
        'first_name', 'last_name','start_datetime', 'end_datetime')
        ->join('bookings_services', 'bookings_services_id', '=', 'bookings_services.id')
        ->join('bookings_service_providers', 'bookings_service_providers.id', '=', 'bookings_services.bookings_service_providers_id')
        ->join ('profile_patients', 'profile_patients.user_id', '=', 'bookings.user_id')
        ->where('bookings_service_providers.profile_doctors_id', $doctor_id)->count();

        return $bookings_count ;
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
