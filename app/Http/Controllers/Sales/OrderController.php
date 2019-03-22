<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = DB::table('orders')
        ->select('order_type', 'orders.id', 'first_name', 'last_name', 'orders.created_at', 
        'orders.status', 'fulfillment', 'total')
        ->join('profile_patients', 'orders.user_id', '=', 'profile_patients.user_id')
        ->get();

        return $orders;
    }

    public function filter(Request $filter, Order $order){
        return Order::all();
    }
}
