<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ShipmentMethod;

class ShipmentController extends Controller
{
    public function index(){
        $shipments = DB::table('shipments')
        ->select('order_id', 'first_name', 'last_name', 'delivery_address', 'orders.total', 'shipments.status')
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
}
