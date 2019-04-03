<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
        ->select('order_type', 'orders.id', 'first_name', 'last_name', 'orders.created_at', 
        'orders.status', 'fulfillment', 'total')
        ->join('profile_patients', 'profile_patients.user_id', '=', 'orders.user_id')
        ->get();

        return $orders;
    }

    public function filter(Request $filter, Order $order)
    {
        return Order::all();
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        //
        $obj = DB::table('orders')
        ->select('orders.id', 'registers.name as register','first_name', 'last_name', 'customer_type', 
        'delivery_address', 'balance', 'orders.total', 'discount', 'orders.sales_tax', 'orders.shipping',
        'orders.status', 'orders.fulfillment', 'orders.created_at')
        ->join('transactions', 'orders.id', '=', 'transactions.order_id')
        ->join('registers', 'transactions.register_id', '=', 'registers.id')
        ->join('profile_patients', 'profile_patients.user_id', '=', 'orders.user_id')
        ->where('orders.id', $order_id)
        ->get();

        $order['order'] = $obj[0];
        $order['items'] = DB::table('order_items')
        ->select('qty', 'name', 'tax')
        ->join('products', 'products.id', '=', 'order_items.product_id')
        ->where('order_items.order_id', $order_id)
        ->get();
        return $order;
    }


    public function showOrder($id)
    {
        $order=Order::find($id);
        return $order;
    }

    public function voidOrder($id)
    {
        $order=Order::find($id);
        $order->status=2;
        $order->save();
        return $order;
    }
	
    

    public function store(Request $request)
    {
        $order=Order::create($request->only(['user_id','order_type','customer_type',
        'delivery_address','status','fulfillment','note','shipping','sales_tax','total','balance']));

        return $order;
    }
}
