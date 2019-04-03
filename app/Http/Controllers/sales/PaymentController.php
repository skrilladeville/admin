<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\PaymentMethod;


class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $payment=Payment::create($request->only(['order_id','register_id','status','payment_method','amount_paid']));
        return $payment;
    }

    public function getPaymentMethods()
        {
            $paymentMethods=PaymentMethod::all();
            return $paymentMethods;
        }
}
