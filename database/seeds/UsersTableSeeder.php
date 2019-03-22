<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      =>  'Admin',
            'email'     =>  'admin@greencardcanada.ca',
            'user_class'=>  'super-admin',
            'email_verified_at' => now(),
            'password'  =>  bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        User::create([
            'name'      =>  'BranchAdmin',
            'email'     =>  'admin@branch1.ca',
            'user_class'=>  'branch-admin',
            'email_verified_at' => now(),
            'password'  =>  bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        User::create([
            'name'      =>  'BranchDoctor1',
            'email'     =>  'branchdoctor1@branch1.ca',
            'user_class'=>  'doctor',
            'email_verified_at' => now(),
            'password'  =>  bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        User::create([
            'name'      =>  'BranchDoctor2',
            'email'     =>  'branchdoctor2@branch1.ca',
            'user_class'=>  'doctor',
            'email_verified_at' => now(),
            'password'  =>  bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        User::create(['name' => 'Patient1', 'email' => 'Patient1@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient2', 'email' => 'Patient2@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient3', 'email' => 'Patient3@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient4', 'email' => 'Patient4@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient5', 'email' => 'Patient5@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient6', 'email' => 'Patient6@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient7', 'email' => 'Patient7@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient8', 'email' => 'Patient8@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient9', 'email' => 'Patient9@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient10', 'email' => 'Patient10@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient11', 'email' => 'Patient11@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient12', 'email' => 'Patient12@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient13', 'email' => 'Patient13@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient14', 'email' => 'Patient14@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient15', 'email' => 'Patient15@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient16', 'email' => 'Patient16@branch1.ca', 'user_class'=>  'patient', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions super-admin and branch admin
        Permission::create(['name' => 'Dashboard User List']);
        Permission::create(['name' => 'Dashboard Reports']);
        Permission::create(['name' => 'Dashboard Prescriptions']);
        Permission::create(['name' => 'Dashboard Booking']);
        Permission::create(['name' => 'Dashboard Continuous Care']);
        Permission::create(['name' => 'View Users']);
        Permission::create(['name' => 'Add User']);
        Permission::create(['name' => 'Edit User']);
        Permission::create(['name' => 'Delete User']);
        Permission::create(['name' => 'View Roles and Permissions']);
        Permission::create(['name' => 'Add Role']);
        Permission::create(['name' => 'Delete Role']);
        Permission::create(['name' => 'View Prescriptions']);
        Permission::create(['name' => 'Add Prescription']);
        Permission::create(['name' => 'Edit Prescription']);
        Permission::create(['name' => 'Delete Prescription']);
        Permission::create(['name' => 'Setup Calendar']);
        Permission::create(['name' => 'View Bookings']);
        Permission::create(['name' => 'Create Booking']);
        Permission::create(['name' => 'Edit Booking']);
        Permission::create(['name' => 'Delete Booking']);
        Permission::create(['name' => 'View Catalog']);
        Permission::create(['name' => 'Modify Users']);
        Permission::create(['name' => 'Modify Roles and Permissions']);
        Permission::create(['name' => 'Sales Orders']);
        Permission::create(['name' => 'Sales Invoices']);
        Permission::create(['name' => 'Shipments']);
        Permission::create(['name' => 'Transactions']);
        Permission::create(['name' => 'Credit Memos']);
        Permission::create(['name' => 'Billing Agreements']);
        Permission::create(['name' => 'Terms of Condition']);
        Permission::create(['name' => 'Recurring Profiles']);
        Permission::create(['name' => 'Sales Tax']);
        Permission::create(['name' => 'View Feedback']);
        Permission::create(['name' => 'Add Feedback']);
        Permission::create(['name' => 'Edit Feedback']);
        Permission::create(['name' => 'Delete Feedback']);
        Permission::create(['name' => 'View Survey']);
        Permission::create(['name' => 'Add Survey']);
        Permission::create(['name' => 'Edit Survey']);
        Permission::create(['name' => 'Delete Survey']);
        Permission::create(['name' => 'Widgets']);
        Permission::create(['name' => 'Sales']);
        Permission::create(['name' => 'Shopping Card']);
        Permission::create(['name' => 'Products']);
        Permission::create(['name' => 'Customers']);
        Permission::create(['name' => 'Reviews']);
        Permission::create(['name' => 'Search Term']);
        Permission::create(['name' => 'Tags']);
        Permission::create(['name' => 'My Account']);
        Permission::create(['name' => 'Tools']);
        Permission::create(['name' => 'Notifications']);
        Permission::create(['name' => 'Manage Currency']);
        Permission::create(['name' => 'Transaction Emails']);
        Permission::create(['name' => 'Custom Variables']);
        Permission::create(['name' => 'Manage Store']);
        Permission::create(['name' => 'Add Patient']);
        Permission::create(['name' => 'Delete Patient']);
        Permission::create(['name' => 'Update Patient']);
        Permission::create(['name' => 'View Patient']);
        Permission::create(['name' => 'Add Doctor']);
        Permission::create(['name' => 'Delete Doctor']);
        Permission::create(['name' => 'Update Doctor']);
        Permission::create(['name' => 'View Doctor']);
        Permission::create(['name' => 'Add Branch Admin']);
        Permission::create(['name' => 'Delete Branch Admin']);
        Permission::create(['name' => 'Update Branch Admin']);
        Permission::create(['name' => 'View Branch Admin']);

        Role::create(['name' => 'super-admin'])->givePermissionTo(Permission::all());

        // assigne permissions to super-admin and branch-admin
        Role::create(['name' => 'branch-admin']);
        // ->givePermissionTo('');

        // assign permissions to doctor
        Role::create(['name' => 'doctor']);
        // ->givePermissionTo('');

        // assign permissions to Patient
        Role::create(['name' => 'Patient']);
        // ->givePermissionTo('');

        // Adding permissions via a role
        User::where('name', 'Admin')->first()->assignRole('super-admin');
        User::where('name', 'BranchAdmin')->first()->assignRole('branch-admin');
        User::where('name', 'BranchDoctor1')->first()->assignRole('doctor');
        User::where('name', 'BranchDoctor2')->first()->assignRole('doctor');
        User::where('name', 'Patient1')->first()->assignRole('Patient');
        User::where('name', 'Patient2')->first()->assignRole('Patient');
        User::where('name', 'Patient3')->first()->assignRole('Patient');
        User::where('name', 'Patient4')->first()->assignRole('Patient');
        User::where('name', 'Patient5')->first()->assignRole('Patient');
        User::where('name', 'Patient6')->first()->assignRole('Patient');
        User::where('name', 'Patient7')->first()->assignRole('Patient');
        User::where('name', 'Patient8')->first()->assignRole('Patient');
        User::where('name', 'Patient9')->first()->assignRole('Patient');
        User::where('name', 'Patient10')->first()->assignRole('Patient');
        User::where('name', 'Patient11')->first()->assignRole('Patient');
        User::where('name', 'Patient12')->first()->assignRole('Patient');
        User::where('name', 'Patient13')->first()->assignRole('Patient');
        User::where('name', 'Patient14')->first()->assignRole('Patient');
        User::where('name', 'Patient15')->first()->assignRole('Patient');
        User::where('name', 'Patient16')->first()->assignRole('Patient');
    }
}
