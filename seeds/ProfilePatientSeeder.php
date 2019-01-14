<?php

use App\User;
use App\ProfilePatient;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ProfilePatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //User::find(4)->assignRole('patient');

        factory(App\ProfilePatient::class, 16)->create();

        /*factory(App\User::class, 16)->create()->each(function ($u) {
            $u->roles()->save(factory(Role::class)->make());
        });*/
    }
}
