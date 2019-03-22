<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Inventory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories=Inventory::with('branch')->get();

        return $inventories->toArray();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    										
    public function store(Request $request)
    {
        $inventory=Inventory::create($request->only(['product_id','branch_id','jar_g_total','one_g_total','one_eight_oz_total','one_eight_oz_total'
        ,'one_fourth_oz_total','one_half_oz_total','one_oz_total','pre_pack_total','total_weight','total_qty','total_qty_per_unit','total_qty_per_unit_range']));
    return $inventory;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory=Inventory::with('branch','product')->find($id);
    } 

    public function getBranchAndProduct($pid,$bid){
        $inventory=Inventory::where('product_id','=',$pid)
                            ->where('branch_id','=',$bid)->get();
        return $inventory;   
    }

    public function updateBranchAndProduct(Request $request,$pid,$bid){
        $inventory=Inventory::where('product_id','=',$pid)
                            ->where('branch_id','=',$bid)->first();
        $inventory->one_g_total+=$request->one_g_total;
        $inventory->jar_g_total+=$request->jar_g_total;
        $inventory->one_eight_oz_total+=$request->one_eight_oz_total;
        $inventory->one_fourth_oz_total+=$request->one_fourth_oz_total;
        $inventory->one_half_oz_total+=$request->one_half_oz_total;
        $inventory->one_oz_total+=$request->one_oz_total;
        $inventory->pre_pack_total+=$request->pre_pack_total;
        $inventory->total_weight+=$request->total_weight;
        $inventory->total_qty+=$request->total_qty;
        $inventory->total_qty_per_unit+=$request->total_qty_per_unit;
        $inventory->total_qty_per_unit_range+=$request->total_qty_per_unit_range;
        $inventory->save();

        return $inventory;
    
        
        
        
        
        
        
        
        
        
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
