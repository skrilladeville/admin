<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function user()
    {
        return $this->hasOne('App\ProfilePatient');
    }
}
