<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeedMapPrice extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongTo('App\Product');
    }
    
}
