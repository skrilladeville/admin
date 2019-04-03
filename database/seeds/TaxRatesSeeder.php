<?php

use Illuminate\Database\Seeder;
use App\TaxRate;

class TaxRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaxRate::create(['province' => 'Alberta', 'category' => 'flower','rate' => '16.8']);
        TaxRate::create(['province' => 'Alberta', 'category' => 'trim','rate' => '16.8']);
        TaxRate::create(['province' => 'Alberta', 'category' => 'seed','rate' => '16.8']);
        TaxRate::create(['province' => 'Alberta', 'category' => 'seedling','rate' => '16.8']);

        TaxRate::create(['province' => 'British Columbia', 'category' => 'flower','rate' => '0']);
        TaxRate::create(['province' => 'British Columbia', 'category' => 'trim','rate' => '0']);
        TaxRate::create(['province' => 'British Columbia', 'category' => 'seed','rate' => '0']);
        TaxRate::create(['province' => 'British Columbia', 'category' => 'seedling','rate' => '0']);

        TaxRate::create(['province' => 'Manitoba', 'category' => 'flower','rate' => '0']);
        TaxRate::create(['province' => 'Manitoba', 'category' => 'trim','rate' => '0']);
        TaxRate::create(['province' => 'Manitoba', 'category' => 'seed','rate' => '0']);
        TaxRate::create(['province' => 'Manitoba', 'category' => 'seedling','rate' => '0']);

        TaxRate::create(['province' => 'New Brunswick', 'category' => 'flower','rate' => '0']);
        TaxRate::create(['province' => 'New Brunswick', 'category' => 'trim','rate' => '0']);
        TaxRate::create(['province' => 'New Brunswick', 'category' => 'seed','rate' => '0']);
        TaxRate::create(['province' => 'New Brunswick', 'category' => 'seedling','rate' => '0']);

        TaxRate::create(['province' => 'Newfoundland and Labrador', 'category' => 'flower','rate' => '0']);
        TaxRate::create(['province' => 'Newfoundland and Labrador', 'category' => 'trim','rate' => '0']);
        TaxRate::create(['province' => 'Newfoundland and Labrador', 'category' => 'seed','rate' => '0']);
        TaxRate::create(['province' => 'Newfoundland and Labrador', 'category' => 'seedling','rate' => '0']);

        TaxRate::create(['province' => 'Northwest Territories', 'category' => 'flower','rate' => '0']);
        TaxRate::create(['province' => 'Northwest Territories', 'category' => 'trim','rate' => '0']);
        TaxRate::create(['province' => 'Northwest Territories', 'category' => 'seed','rate' => '0']);
        TaxRate::create(['province' => 'Northwest Territories', 'category' => 'seedling','rate' => '0']);

        TaxRate::create(['province' => 'Nova Scotia', 'category' => 'flower','rate' => '0']);
        TaxRate::create(['province' => 'Nova Scotia', 'category' => 'trim','rate' => '0']);
        TaxRate::create(['province' => 'Nova Scotia', 'category' => 'seed','rate' => '0']);
        TaxRate::create(['province' => 'Nova Scotia', 'category' => 'seedling','rate' => '0']);

        TaxRate::create(['province' => 'Nunavut', 'category' => 'flower','rate' => '19.3']);
        TaxRate::create(['province' => 'Nunavut', 'category' => 'trim','rate' => '19.3']);
        TaxRate::create(['province' => 'Nunavut', 'category' => 'seed','rate' => '19.3']);
        TaxRate::create(['province' => 'Nunavut', 'category' => 'seedling','rate' => '19.3']);

        TaxRate::create(['province' => 'Ontario', 'category' => 'flower','rate' => '3.9']);
        TaxRate::create(['province' => 'Ontario', 'category' => 'trim','rate' => '3.9']);
        TaxRate::create(['province' => 'Ontario', 'category' => 'seed','rate' => '3.9']);
        TaxRate::create(['province' => 'Ontario', 'category' => 'seedling','rate' => '3.9']);

        TaxRate::create(['province' => 'Prince Edward Island', 'category' => 'flower','rate' => '0']);
        TaxRate::create(['province' => 'Prince Edward Island', 'category' => 'trim','rate' => '0']);
        TaxRate::create(['province' => 'Prince Edward Island', 'category' => 'seed','rate' => '0']);
        TaxRate::create(['province' => 'Prince Edward Island', 'category' => 'seedling','rate' => '0']);

        TaxRate::create(['province' => 'Quebec', 'category' => 'flower','rate' => '0']);
        TaxRate::create(['province' => 'Quebec', 'category' => 'trim','rate' => '0']);
        TaxRate::create(['province' => 'Quebec', 'category' => 'seed','rate' => '0']);
        TaxRate::create(['province' => 'Quebec', 'category' => 'seedling','rate' => '0']);

        TaxRate::create(['province' => 'Saskatchewan', 'category' => 'flower','rate' => '6.45']);
        TaxRate::create(['province' => 'Saskatchewan', 'category' => 'trim','rate' => '6.45']);
        TaxRate::create(['province' => 'Saskatchewan', 'category' => 'seed','rate' => '6.45']);
        TaxRate::create(['province' => 'Saskatchewan', 'category' => 'seedling','rate' => '6.45']);

        TaxRate::create(['province' => 'Yukon', 'category' => 'flower','rate' => '0']);
        TaxRate::create(['province' => 'Yukon', 'category' => 'trim','rate' => '6.45']);
        TaxRate::create(['province' => 'Yukon', 'category' => 'seed','rate' => '6.45']);
        TaxRate::create(['province' => 'Yukon', 'category' => 'seedling','rate' => '6.45']);
    }
}
