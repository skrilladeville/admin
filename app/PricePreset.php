<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricePreset extends Model
{
    protected $guarded = [];

    public function prices(){
        return $this->hasMany('App\Price');
    }
}
