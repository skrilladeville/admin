<?php

namespace App\Http\Controllers\ContinuousCare;

use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $feedback = Feedback::where('profile_doctors_id', $request->user()->id)->get();

        return response()->json([
            "feedbacks" => $feedback
        ], 200);
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
        $feedback=Feedback::create($request->only(['vote','score','what_did_work', 'what_did_not_work','why','profile_doctors_id','profile_patients_id']));

    
    
       
        return response()->json([
            "feedback" => $feedback], 200);
    
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

        $feedback= Feedback::findOrFail($id);
        
        return response()->json([
            "feedback" => $feedback
        ], 200);
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
        $feedback = Feedback::find($id);

        $feedback->update($request->only(['vote','score','what_did_work', 'what_did_not_work','why',
                                        'profile_doctors_id','profile_patients_id']));


        return response()->json([
            "feedback" => $feedback
        ], 200);
        
      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feedback::destroy($id);

        return reponse()->json(["success"=>"ok"],200);
    }

    public function all()
    {
        
            $feedbacks = Feedback::all();
    
            return response()->json([
                "feedbacks" => $feedbacks
            ], 200);
    
}

}
