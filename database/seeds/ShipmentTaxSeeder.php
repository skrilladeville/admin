<?php

use Illuminate\Database\Seeder;
use App\ShipmentTax;

class ShipmentTaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShipmentTax::create(['province'=>'Alberta', 'type'=>'GST', 'rate'=>'5']);
        ShipmentTax::create(['province'=>'Alberta', 'type'=>'PST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Alberta', 'type'=>'HST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Alberta', 'type'=>'QST', 'rate'=>'0']);

        ShipmentTax::create(['province'=>'British Columbia', 'type'=>'GST', 'rate'=>'5']);
        ShipmentTax::create(['province'=>'British Columbia', 'type'=>'PST', 'rate'=>'7']);
        ShipmentTax::create(['province'=>'British Columbia', 'type'=>'HST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'British Columbia', 'type'=>'QST', 'rate'=>'0']);

        ShipmentTax::create(['province'=>'Manitoba', 'type'=>'GST', 'rate'=>'5']);
        ShipmentTax::create(['province'=>'Manitoba', 'type'=>'PST', 'rate'=>'8']);
        ShipmentTax::create(['province'=>'Manitoba', 'type'=>'HST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Manitoba', 'type'=>'QST', 'rate'=>'0']);

        ShipmentTax::create(['province'=>'New Brunswick', 'type'=>'GST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'New Brunswick', 'type'=>'PST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'New Brunswick', 'type'=>'HST', 'rate'=>'15']);
        ShipmentTax::create(['province'=>'New Brunswick', 'type'=>'QST', 'rate'=>'0']);

        ShipmentTax::create(['province'=>'Newfoundland and Labrador', 'type'=>'GST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Newfoundland and Labrador', 'type'=>'PST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Newfoundland and Labrador', 'type'=>'HST', 'rate'=>'15']);
        ShipmentTax::create(['province'=>'Newfoundland and Labrador', 'type'=>'QST', 'rate'=>'0']);

        ShipmentTax::create(['province'=>'Northwest Territories', 'type'=>'GST', 'rate'=>'5']);
        ShipmentTax::create(['province'=>'Northwest Territories', 'type'=>'PST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Northwest Territories', 'type'=>'HST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Northwest Territories', 'type'=>'QST', 'rate'=>'0']);

        ShipmentTax::create(['province'=>'Nova Scotia', 'type'=>'GST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Nova Scotia', 'type'=>'PST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Nova Scotia', 'type'=>'HST', 'rate'=>'15']);
        ShipmentTax::create(['province'=>'Nova Scotia', 'type'=>'QST', 'rate'=>'0']);

        ShipmentTax::create(['province'=>'Nunavut', 'type'=>'GST', 'rate'=>'5']);
        ShipmentTax::create(['province'=>'Nunavut', 'type'=>'PST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Nunavut', 'type'=>'HST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Nunavut', 'type'=>'QST', 'rate'=>'0']);

        ShipmentTax::create(['province'=>'Ontario', 'type'=>'GST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Ontario', 'type'=>'PST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Ontario', 'type'=>'HST', 'rate'=>'13']);
        ShipmentTax::create(['province'=>'Ontario', 'type'=>'QST', 'rate'=>'0']);

        ShipmentTax::create(['province'=>'Prince Edward Island', 'type'=>'GST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Prince Edward Island', 'type'=>'PST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Prince Edward Island', 'type'=>'HST', 'rate'=>'15']);
        ShipmentTax::create(['province'=>'Prince Edward Island', 'type'=>'QST', 'rate'=>'0']);

        ShipmentTax::create(['province'=>'Quebec', 'type'=>'GST', 'rate'=>'5']);
        ShipmentTax::create(['province'=>'Quebec', 'type'=>'PST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Quebec', 'type'=>'HST', 'rate'=>'9.975']);
        ShipmentTax::create(['province'=>'Quebec', 'type'=>'QST', 'rate'=>'0']);

        ShipmentTax::create(['province'=>'Saskatchewan', 'type'=>'GST', 'rate'=>'5']);
        ShipmentTax::create(['province'=>'Saskatchewan', 'type'=>'PST', 'rate'=>'6']);
        ShipmentTax::create(['province'=>'Saskatchewan', 'type'=>'HST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Saskatchewan', 'type'=>'QST', 'rate'=>'0']);

        ShipmentTax::create(['province'=>'Yukon', 'type'=>'GST', 'rate'=>'5']);
        ShipmentTax::create(['province'=>'Yukon', 'type'=>'PST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Yukon', 'type'=>'HST', 'rate'=>'0']);
        ShipmentTax::create(['province'=>'Yukon', 'type'=>'QST', 'rate'=>'0']);
    }
}
