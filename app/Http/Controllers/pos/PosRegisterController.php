<?php

namespace App\Http\Controllers\pos;


use App\Http\Controllers\Controller;
use App\Register;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PosRegisterController extends Controller
{
    public function index(){
        $registers=Register::all();
        return $registers;
    }
}
