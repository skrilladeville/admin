<?php

namespace App;

use App\PatientList;
use Illuminate\Database\Eloquent\Model;

class ShoppingCarts extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shopping_carts';
    protected $casts = [
        'created_at' => 'date:Y F d',
        'edited_at' => 'date:Y F d',
        'completed_at' => 'date:Y F d'
    ];

    /**
     * Accessor to get the name associated with the customer id.
     *
     * @param  string  $value
     * @return string
     */
    public function getCustomerIdAttribute($value)
    {
        $customer = PatientList::find($value);

        if( $customer )
            return ucwords($customer->lastname. ', ' .$customer->firstname);
        else
            return 'IP '. rand(1,255) .'.'. rand(1,255) .'.'. rand(1,255) .'.'. rand(1,255);
    }
}