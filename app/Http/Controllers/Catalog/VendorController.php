<?php
namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Vendor;
use App\Http\Controllers\Controller;


class VendorController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors=Vendor::all();

        return $vendors;

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
       $vendor= Vendor::create($request->only(["name","licence_or_registration_no","profile_patients_id","description","address","phone","fax","email","skype"]));
   
     return $vendor;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor= Vendor::findOrFail($id);
        
        return $vendor;
        
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
        $vendor=Vendor::find($id);

        $vendor= Vendor::create($request->only(["name","licence_or_registration_no","profile_patients_id","description","address","phone","fax","email","skype"]));
   
        return $vendor;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor=Vendor::find($id);
        $vendor->delete();

        return response()->json([
            "success" => "ok"
        ], 200);

    }
}
