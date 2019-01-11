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

        return $feedback;
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
        $feedback = new Feedback;

        $feedback->vote = 1;
        $feedback->score = 5;
        $feedback->what_did_work = 'It did work!';
        $feedback->what_did_not_work = 'Somethings dont work!';
        $feedback->why = 'It depends...';
        $feedback->profile_doctors_id = 3;
        $feedback->profile_patients_id = $request->user()->id;

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

        return Feedback::findOrFail($id);
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
    public function destroy($id)
    {
        return Feedback::destroy($id);
    }
}
