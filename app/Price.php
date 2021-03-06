<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guarded = [];

    public function pricePreset()
    {
        return $this->belongsTo('App\PricePreset');
    }

    public function product()
    {
        return $this->belongTo('App\Product');
    }


}
