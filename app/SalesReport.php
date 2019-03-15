<?php

namespace App;

use App\ProductList;
use Illuminate\Database\Eloquent\Model;

class SalesReport extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sales_log';
    protected $appends = array('order_time');
    
    protected $casts = [
        'order_date' => 'date:Y F d',
        'order_time' => 'date:mm'
    ];

    /**
     * Accessor to get the name associated with the customer id.
     *
     * @param  string  $value
     * @return string
     */
    public function getCustomerIdAttribute($value)
    {
        $patient = PatientList::find($value);

        if( $patient )
            return ucwords($patient->lastname. ', ' .$patient->firstname);
        else
            return '(customer missing)';
    }

    /**
     * Accessor to get the name associated with the shelf id.
     *
     * @param  string  $value
     * @return string
     */
    public function getShelfIdAttribute($value)
    {
        $shelfName = array(
            1 => 'GreencardCanada.ca',
            2 => 'demo.GreencardCanada.ca',
            3 => 'prod.GreencardCanada.ca',
            4 => 'Digital Ocean'
        );

        return $shelfName[$value];
    }

    /**
     * Accessor to get the calculation associated with the tax calc id.
     *
     * @param  string  $value
     * @return string
     */
    public function getRegisterIdAttribute($value)
    {
        $clientDevice = array(
            1 => 'Samsung Galaxy Tab',
            2 => 'Customer iPad',
            3 => 'Alexa',
            4 => 'Siri',
            5 => 'iPhone X',
            6 => 'Dell Laptop',
            7 => 'Toshiba Laptop',
            8 => 'HP Laptop',
            9 => 'Compaq',
            10 => 'IBM',
            11 => 'Lenovo',
            12 => 'Xiaomi TV Box',
            13 => 'Xbox',
            14 => 'Playstation 4',
            15 => 'Apple TV',
            16 => 'Android Box'
        );

        return $clientDevice[$value];
    }

    /**
     * Accessor to get the method name associated with the payment method id.
     *
     * @param  string  $value
     * @return string
     */
    public function getPaymentMethodIdAttribute($value)
    {
        $payMethod = array(
            1 => 'Credit Card',
            2 => 'Cash',
            3 => 'Check',
            4 => 'Store Credit'
        );

        return $payMethod[$value];
    }

    /**
     * Accessor to get the type name associated with the order type id.
     *
     * @param  string  $value
     * @return string
     */
    public function getOrderTypeIdAttribute($value)
    {
        $orderType = array(
            1 => 'Walk In',
            2 => 'Delivery',
            3 => 'Pick Up',
        );

        return $orderType[$value];
    }

    public function getOrderTimeAttribute()
    {
        $date = $this->order_date;
        return $date->format('h:i:s A');  
    }
}
