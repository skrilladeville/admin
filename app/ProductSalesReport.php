<?php

namespace App;

use App\ProductList;
use App\SalesReport;

class ProductSalesReport extends SalesReport
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'product_sales_stats';
  protected $appends = array('profit_gross','profit_gross_percent');
    
  protected $casts = [
    'date_sold' => 'date:Y F d'
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

  public function getOrderTimeAttribute()
  {
      return false;  
  }

  /**
   * Accessor to get the source name associated with the source id.
   *
   * @param  string  $value
   * @return string
   */
  public function getSourceIdAttribute($value)
  {
    $source = array(
      1 => 'In-Store',
      2 => 'Potify',
      3 => 'WooCommerce',
      4 => 'Offline Store'
    );

    return $source[$value];
  }

  public function getProfitGrossAttribute()
  {
    return $this->sales_gross - $this->COGS;  
  }

  public function getProfitGrossPercentAttribute()
  {
    return ( $this->profit_gross / $this->sales_gross ) * 100;
  }
}