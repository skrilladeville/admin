<?php
use Illuminate\Database\Seeder;

class GCCv1TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=GCCv1TablesSeeder
     *
     * @return void
     */
    public function run()
    {
        /* sql dumps must be in UTF-8 encoding
            if INSERT scripts with DATE type data get ignored
            set DATE type to TEXT type
         */
        $dumps = array(
            'gccv1_doctor_accounts',
            'gccv1_doctor_diagnosis',
            'gccv1_doctor_rx',
            'gccv1_gcis_users',
            'gccv1_patient_feedback',
            'gccv1_prescription',
            'gccv1_rx'
        );

        $sql = new DatabaseSeeder;
        return $sql->import($dumps);
    }
}