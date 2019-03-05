<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\ProfileDoctor;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfileDoctorStoreRequest;

class ProfileDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile_doctors= ProfileDoctor::all();

        return $profile_doctors;
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
        $profile = ProfileDoctor::select('profile_doctors.*', 'email')
        ->where('user_id', $user_id)
        ->join('users', 'users.id', '=', 'user_id')
        ->first();
        return $profile;
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
    public function update(ProfileDoctorStoreRequest $request, $id)
    {
        //
        $profile = ProfileDoctor::where('user_id', $id)->firstOrFail();
        $data = $request->except('_token');
        foreach($data as $key => $value){
            if(array_key_exists($key, $profile)){
                $profile[$key] = $value;
            }
        }

        if($request->validated()){
            $user = User::findOrFail($id);
            $user->email = $request->email;
            // $profile = $request;
            if($profile->save()){
                $user->save();
            }
        }
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
