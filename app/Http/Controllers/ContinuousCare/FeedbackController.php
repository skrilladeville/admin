<?php

namespace App\Http\Controllers\ContinuousCare;

use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        $feedback = DB::table('feedback')
            ->select('feedback.*','profile_doctors.first_name as doctor_fname',
            'profile_doctors.last_name as doctor_lname',
            'profile_patients.first_name as patient_fname',
            'profile_patients.last_name as patient_lname')
            ->join('profile_doctors', 'feedback.profile_doctors_id', '=', 'profile_doctors.id')
            ->join('profile_patients', 'feedback.profile_patients_id', '=', 'profile_patients.id')
            ->get();

        return $feedback;
    // } else {
     //       $feedback = Feedback::where('profile_doctors_id', $id)->get();

       //     return $feedback;
      //  }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feedback=Feedback::create($request->only(['vote','score','what_did_work', 'what_did_not_work','why','profile_doctors_id','profile_patients_id']));
        $feedback->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$feedback = Feedback::where('profile_doctors_id', $id)->get();

        $feedback = Feedback::findOrFail($id);

        // return response()->json([
        //     "feedback" => $feedback
        // ], 200);
        return  $feedback;
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
        // $feedback = Feedback::find($id);

        // $feedback->update($request->only(['vote','score','what_did_work', 'what_did_not_work','why',
        //                                 'profile_doctors_id','profile_patients_id']));


        // return response()->json([
        //     "feedback" => $feedback
        // ], 200);

        $feedback = Feedback::find($id);
        $feedback->vote = 1;
        $feedback->score = 5;
        $feedback->what_did_work = 'It did work...';
        $feedback->what_did_not_work = 'Somethings dont work!';
        $feedback->why = 'It depends...';
        $feedback->profile_doctors_id = 3;
        $feedback->profile_patients_id = $request->user()->id;

        $feedback->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Feedback::destroy($id);

        // return reponse()->json(["success"=>"ok"], 200);

        return Feedback::destroy($id);
    }
}
