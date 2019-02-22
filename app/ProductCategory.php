<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $guarded = [];

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function marijuanaProducts(){
        return $this->hasMany('App\Product')->where('products.is_marijuana', '=', '1');
    }
    public function nonmarijuanaProducts(){
        return $this->hasMany('App\Product')->where('products.is_marijuana', '=', '0');
    }
}
