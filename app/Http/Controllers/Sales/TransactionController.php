<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $transactions = DB::table('transactions')
        ->select('registers.name', 'transactions.created_at', 'orders.total', 'orders.balance', 
        'orders.sales_tax', 'transaction_types.type', 'register_type', 'amount', 'discount')
        ->join('orders', 'orders.id', '=', 'transactions.order_id')
        ->join('registers', 'registers.id', '=', 'transactions.register_id')
        ->join('transaction_types', 'transaction_types.id', '=', 'transactions.transaction_type')
        ->get();

        return $transactions;
    }
}
