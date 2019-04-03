<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxTier extends Model
{
    protected $fillable = [
        "name"
    ];

    public function rates()
    {
        return $this->belongsToMany('App\TaxRate', 'tax_tiers_has_tax_rates');
    }
}
