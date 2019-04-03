<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketingStatistics extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marketing_stats';
    protected $casts = [
      'created_at' => 'date:Y F d',
      'begins_at' => 'date:Y F d',
      'ends_at' => 'date:Y F d',
      'counted_last_at' => 'date:Y F d'
  ];

    /**
     * Accessor to get the name associated with the Promo id.
     *
     * @param  string  $value
     * @return string
     */
    public function getPromoIdAttribute($value)
    {
        $name = array(
            1 => 'Valentines Gift Coupons',
            2 => 'New Year Blast',
            3 => 'How Are You Blast',
            4 => 'Store Winter Sale 2018',
            5 => 'Store Spring Sale 2018',
            6 => 'Facebook Page Post 41',
            7 => 'Invite a Friend 2017',
            8 => 'Holy Cow Nights'
        );

        return $name[$value];
    }

    /**
     * Accessor to get the name associated with the handout_type id.
     *
     * @param  string  $value
     * @return string
     */
    public function getHandoutTypeIdAttribute($value)
    {
        $name = array(
            1 => 'email',
            2 => 'sms',
            3 => 'mail',
            4 => 'robocall',
            5 => 'flyer',
            6 => 'poster',
            7 => 'coupon',
            8 => 'code'
        );

        return $name[$value];
    }
}