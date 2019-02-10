<?php


namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Lab;
use App\Http\Controllers\Controller;

class LabController extends Controller
{


    public function index(){
        $labs= Lab::all();
        return $labs->toArray();
    }

    public function store(Request $request)
    {
        $lab= Lab::create($request->only(["name","licence_no","description","phone","fax","email","city_state_zip"]));
        return $lab;
    }


    public function archieve($id)
    {
        $lab=Lab::find($id);
        $lab->is_archieve=true;
        $lab->save();

        return response()->json([
            "success" => "ok"
        ], 200);
    }

    public function unarchieve($id)
    {
        $lab=Lab::find($id);
        $lab->is_archieve=false;
        $lab->save();
        return response()->json([
            "success" => "ok"
        ], 200);
    }


    public function show($id)
    {
        $lab=Lab::find($id);
        return $lab;
        return response()->json([
            "success" => "ok"
        ], 200);
    }

    public function update(Request $request,$id)
    {
        $lab=Lab::find($id);
        $lab->update($request->only(["name","licence_no","description","phone","fax","email","city_state_zip"]));
        return $lab;
    }

    public function destroy($id){
        $lab=Lab::find($id);
        $lab->delete();

        
        return response()->json([
            "success" => "ok"
        ], 200);
    }
}
