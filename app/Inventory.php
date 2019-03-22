<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $guarded = [];

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function branch()
    {
        return $this->belongTo('App\Branch');
    }
}
