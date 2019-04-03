<?php
use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* sql dumps must be in UTF-8 encoding
            if INSERT scripts with DATE type data get ignored
            set DATE type to TEXT type
         */
        $reportsDump = array(
            'expenses_log',
            'marketing_stats',
            'patient_action_stats',
            'patient_profiles',
            'patient_store_stats',
            'product_excise_stats',
            'product_inventory_incoming',
            'product_sales_stats',
            // 'products',
            'registers_log',
            'sales_log',
            'shopping_carts'
        );

        $sql = new DatabaseSeeder;
        return $sql->import($reportsDump);
    }
}