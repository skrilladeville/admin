<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShipmentMethod;
use App\Shipment;

class ShipmentController extends Controller
{
    public function index(){
        $shipments = DB::table('shipments')
        ->select('shipments.id', 'order_id', 'first_name', 'last_name', 'delivery_address', 'orders.total', 'shipments.status')
        ->join('shipment_methods', 'shipment_methods.id', '=', 'shipments.shipment_method')
        ->join('orders', 'orders.id', '=', 'shipments.order_id')
        ->join('profile_patients', 'profile_patients.user_id', '=', 'orders.user_id')
        ->get();

        return $shipments;
    }

    public function shipmentMethods(){
        $shipment_methods = DB::table('shipment_methods')
        ->select()
        ->join('shipment_types', 'shipment_types.id', '=', 'shipment_methods.type')
        ->get();

        return $shipment_methods;
    }

    public function update($id){
        $shipment = Shipment::findOrFail($id);
        if($shipment){
            $shipment->status = 2; //status to cancelled
            $shipment->save();
        }
    }

    public function store(Request $request){
        $shipment_method = ShipmentMethod::create($request->all());
        
        if($shipment_method){
            $shipment_method->save();
        }

    }

    public function show($id){
        $shipment_method = ShipmentMethod::findOrFail($id);

        return $shipment_method;
    }

    public function updateShipmentMethod(Request $request, $id){
        $shipment_method = ShipmentMethod::where('id', $id)->firstOrFail();
       
        $data = $request->except('_token');
        foreach($data as $key => $value){
            if(array_key_exists($key, $shipment_method)){
                $shipment_method[$key] = $value;
            }
        }
        $shipment_method->save();
        // return $data;
    }
}
