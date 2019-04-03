<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxSetting extends Model
{
    protected $fillable = [
        'enable_tax', 'apply_biz_tax', 'prices_inclusive_tax', 'tier_w/card',
        'tier_18+', 'tier_adult_use', 'tier_walk_in'
    ];
}
