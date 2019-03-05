<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];


    public function productCategory(){
        return $this->belongsTo('App\ProductCategory');
    }

    public function tags()
    {
        return $this->hasMany('App\ProductTag');   
    }

    public function checkinProducts()
    {
        return $this->hasMany('App\CheckInProduct');   
    }

    public function weedMapPrices()
    {
        return $this->hasMany('App\WeedMapPrice');   
    }

    public function labResults(){
        return $this->hasMany('App\LabResult');   
    }

    public function prices()
    {
        return $this->hasMany('App\Price');
    }
    
    
}
