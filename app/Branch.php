<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'branch_name', 'branch_description', 'status',
    ];

    protected $guarded = [];

    public function inventory()
    {
        return $this->hasOne('App\Inventory');
    }
}
