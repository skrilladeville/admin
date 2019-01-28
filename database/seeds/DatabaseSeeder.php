<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
        $this->call(UsersTableSeeder::class);
        //$this->call(PrescriptionSeeder::class);
        //$this->call(DiagnosisSeeder::class);
    }
}
