<?php

namespace App;

use App\ProductList;
use Illuminate\Database\Eloquent\Model;

class StateCompliance extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_excise_stats';
    
    protected $casts = [
        'month_sold' => 'date:Y F',
    ];

    /**
     * Accessor to get the name associated with the product id.
     *
     * @param  string  $value
     * @return string
     */
    public function getProductIdAttribute($value)
    {
        $prod = ProductList::find($value);

        if( $prod )
            return ucwords($prod->name);
        else
            return '(missing product)';
    }

    /**
     * Accessor to get the name associated with the location id.
     *
     * @param  string  $value
     * @return string
     */
    public function getLocationIdAttribute($value)
    {
        $locationName = array(
            1 => 'Alberta',
            2 => 'British Columbia',
            3 => 'Manitoba',
            4 => 'New Brunswick',
            5 => 'Newfoundland',
            6 => 'Labrador',
            7 => 'Northwest Territories',
            8 => 'Nova Scotia',
            9 => 'Nunavut',
            10 => 'Ontario',
            11 => 'Prince Edward Island',
            12 => 'Quebec',
            13 => 'Saskatchewan',
            14 => 'Yukon'
        );

        return $locationName[$value];
    }

    /**
     * Accessor to get the calculation associated with the tax calc id.
     *
     * @param  string  $value
     * @return string
     */
    public function getTaxCalcAttribute($value)
    {
        $calculation = array(
            1 => '$0.25/gram or 2.5%/amt',
            2 => '$0.075/gram or 2.5%/amt',
            3 => '$0.25/viable seed or 2.5%/amt',
            4 => '$0.25/vegetative cannabis plant or 2.5%/amt',
            5 => '$0.75/gram or 7.5%/amt + 16.8% adj',
            6 => '$0.225/gram or 7.5%/amt + 16.8% adj',
            7 => '$0.75/viable seed or 7.5%/amt + 16.8% adj',
            8 => '$0.75/vegetative cannabis plant or 7.5%/amt + 16.8% adj'
        );

        return $calculation[$value];
    }
}
