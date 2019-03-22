<?php

namespace App;

use App\ProductList;
use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_inventory_incoming';
   
    protected $casts = [
        'created_at' => 'date:Y F d'
    ];

    /**
     * Accessor to get the transaction number associated with the transaction id.
     *
     * @param  string  $value
     * @return string
     */
    public function getTransactionIdAttribute($value)
    {
        return str_pad( $value,11,'TR0000000000',STR_PAD_LEFT );
    }

    /**
     * Accessor to get the name associated with the vendor id.
     *
     * @param  string  $value
     * @return string
     */
    public function getVendorIdAttribute($value)
    {
        $measureUnit = array(
            1 => 'Cannabism Incorporated',
            2 => 'Cannabis Delights',
            3 => 'Cannabis r\' Us',
            4 => 'Marie and Juana Supply',
            5 => 'Canna de Verde',
            6 => 'Herbal Medical Supply',
            7 => 'Canna de Pravia',
            8 => 'Cannabishi'
        );

        return $measureUnit[$value];
    }

    /**
     * Accessor to get the unit name associated with the product unit id.
     *
     * @param  string  $value
     * @return string
     */
    public function getProductUnitIdAttribute($value)
    {
        $measureUnit = array(
            1 => 'g',
            2 => 'kg',
            3 => 'pc',
            4 => 'box',
            5 => 'l',
            6 => 'cc',
            7 => 'ml',
            8 => 'ton'
        );

        return $measureUnit[$value] . $this->unit($measureUnit[$value]);
    }

    /**
     * Accessor to get the plural of product unit used.
     *
     * @param  string  $value
     * @return string
     */
    public function unit($value)
    {
        $append = '';
        if( ( $this->product_qty > 1 ) && in_array( $value,array( 'pc','box','ton' ) ) ){
            $append = 's';
            if( $value == 'box' )
                $append = 'es';
        }

        return $append;
    }
    
    /**
     * Accessor to get the name associated with the receiver id.
     *
     * @param  string  $value
     * @return string
     */
    public function getReceiverIdAttribute($value)
    {
        $receiverName = array(
            1 => 'Esmael Alić',
            2 => 'Charles Mendoza',
            3 => 'Benjie Murillo',
            4 => 'Junel Addison Iporong'
        );

        return $receiverName[$value];
    }

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
}
