<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentMethod extends Model
{
    protected $fillable = [
        "charge","end_time","free_after","is_active","method","min_amount",
        "start_time","type"
    ];

}
