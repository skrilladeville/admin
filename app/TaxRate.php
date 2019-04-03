<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxRate extends Model
{
    public function tiers()
    {
        return $this->belongsToMany('App\TaxTier');
    }
}
