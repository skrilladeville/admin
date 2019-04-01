<?php

namespace App\Http\Controllers\Patients;

use App\PatientList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return PatientList::all();
    }

    public function data()
    {
        return ['data' => PatientList::all()];
    }
}