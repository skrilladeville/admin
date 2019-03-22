<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * php artisan migrate:refresh --seed
     * php artisan db:seed
     * php artisan db:seed --class=UsersTableSeeder
     *
     * php artisan make:seeder UsersTableSeeder
     * 
     * If a seeder class is not found, run
     * composer dump-autoload
     * 
     * @see https://laravel.com/docs/5.7/seeding
     * 
     * @return void
     */
    public function run()
    {
        $this->call(BranchSeeder::class);
        $this->call(ProfileAdminSeeder::class);
        $this->call(ProfileBranchAdminSeeder::class);
        $this->call(ProfileDoctorSeeder::class);
        $this->call(ProfilePatientSeeder::class);
        $this->call(VendorsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(RegistersSeeder::class);
        $this->call(ShipmentTypesSeeder::class);
        $this->call(ShipmentMethodsSeeder::class);
        $this->call(TransactionTypesSeeder::class);
        $this->call(PaymentMethodsSeeder::class);
        $this->call(ShipmentsSeeder::class);
        $this->call(TransactionsSeeder::class);
        //$this->call(PrescriptionSeeder::class);
        //$this->call(DiagnosisSeeder::class);

        $this->call([
            // UsersTableSeeder::class,
            ReportsTableSeeder::class,
        ]);
    }
}
