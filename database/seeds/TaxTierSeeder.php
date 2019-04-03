<?php

use Illuminate\Database\Seeder;
use App\TaxTier;
use App\TaxSetting;

class TaxTierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaxSetting::create([
            'enable_tax' => 0,
            'apply_biz_tax' => 0,
            'tier_w/card'=>null,
            'tier_18+'=>null,
            'tier_adult_use'=>null,
            'tier_walk_in' =>null,
            'prices_inclusive_tax'=> 0
        ]);

        TaxTier::create(['name'=>'Tax Tier 1']);
        TaxTier::create(['name'=>'Tax Tier 2']);
        TaxTier::create(['name'=>'Tax Tier 3']);
    }
}
