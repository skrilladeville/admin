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
            'email_verified_at' => now(),
            'password'  =>  bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        User::create([
            'name'      =>  'BranchAdmin',
            'email'     =>  'admin@branch1.ca',
            'email_verified_at' => now(),
            'password'  =>  bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        User::create([
            'name'      =>  'BranchDoctor1',
            'email'     =>  'branchdoctor1@branch1.ca',
            'email_verified_at' => now(),
            'password'  =>  bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        User::create([
            'name'      =>  'BranchDoctor2',
            'email'     =>  'branchdoctor2@branch1.ca',
            'email_verified_at' => now(),
            'password'  =>  bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        User::create(['name' => 'Patient1', 'email' => 'patient1@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient2', 'email' => 'patient2@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient3', 'email' => 'patient3@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient4', 'email' => 'patient4@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient5', 'email' => 'patient5@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient6', 'email' => 'patient6@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient7', 'email' => 'patient7@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient8', 'email' => 'patient8@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient9', 'email' => 'patient9@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient10', 'email' => 'patient10@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient11', 'email' => 'patient11@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient12', 'email' => 'patient12@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient13', 'email' => 'patient13@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient14', 'email' => 'patient14@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient15', 'email' => 'patient15@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);
        User::create(['name' => 'Patient16', 'email' => 'patient16@branch1.ca', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'remember_token' => str_random(10)]);

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions super-admin and branch admin
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'roles permissions']);
        Permission::create(['name' => 'product list']);
        Permission::create(['name' => 'product categories']);
        Permission::create(['name' => 'product attributes']);
        Permission::create(['name' => 'sales orders']);
        Permission::create(['name' => 'sales invoices']);
        Permission::create(['name' => 'sales shipments']);
        Permission::create(['name' => 'sales transactions']);
        Permission::create(['name' => 'sales credit memos']);
        Permission::create(['name' => 'sales billing agreements']);
        Permission::create(['name' => 'sales terms of condition']);
        Permission::create(['name' => 'sales recurring profiles']);
        Permission::create(['name' => 'sales tax']);
        Permission::create(['name' => 'cms feedback']);
        Permission::create(['name' => 'cms survey']);
        Permission::create(['name' => 'cms widgets']);
        Permission::create(['name' => 'reports sales']);
        Permission::create(['name' => 'reports shopping card']);
        Permission::create(['name' => 'reports product']);
        Permission::create(['name' => 'reports customers']);
        Permission::create(['name' => 'reports tags']);
        Permission::create(['name' => 'reports reviews']);
        Permission::create(['name' => 'reports search term']);
        Permission::create(['name' => 'system my account']);
        Permission::create(['name' => 'system tools']);
        Permission::create(['name' => 'system notifications']);
        Permission::create(['name' => 'system manage currency']);
        Permission::create(['name' => 'system transaction emails']);
        Permission::create(['name' => 'system custom variables']);
        Permission::create(['name' => 'system manage store']);
        Permission::create(['name' => 'system order status']);
        Permission::create(['name' => 'system configuration']);

        $superAdmin = Role::create(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // assigne permissions to super-admin and branch-admin
        $branchAdmin = Role::create(['name' => 'branch-admin']);
        $branchAdmin->givePermissionTo(
            'dashboard',
            'manage users',
            'product list',
            'product categories',
            'product attributes',
            'sales orders',
            'sales invoices',
            'sales shipments',
            'sales transactions',
            'sales credit memos',
            'sales billing agreements',
            'sales terms of condition',
            'sales recurring profiles',
            'sales tax',
            'cms feedback',
            'cms survey',
            'cms widgets',
            'reports sales',
            'reports shopping card',
            'reports product',
            'reports customers',
            'reports tags',
            'reports reviews',
            'reports search term'
        );

        // create permissions doctor
        Permission::create(['name' => 'patient add']);
        Permission::create(['name' => 'patient view']);
        Permission::create(['name' => 'patient archive']);
        Permission::create(['name' => 'prescription rx list']);
        Permission::create(['name' => 'prescription create']);
        Permission::create(['name' => 'prescription archive']);
        Permission::create(['name' => 'booking create']);
        Permission::create(['name' => 'booking view']);
        Permission::create(['name' => 'booking setup calendar']);
        Permission::create(['name' => 'booking archive']);
        Permission::create(['name' => 'feedback']);
        Permission::create(['name' => 'survey']);
        Permission::create(['name' => 'contract']);

        // assign permissions to doctor
        $doctor = Role::create(['name' => 'doctor']);
        $doctor->givePermissionTo(
            'dashboard',
            'patient add',
            'patient view',
            'patient archive',
            'prescription rx list',
            'prescription create',
            'prescription archive',
            'booking create',
            'booking view',
            'booking setup calendar',
            'booking archive',
            'feedback',
            'survey'
        );

        // assign permissions to doctor
        $doctor = Role::create(['name' => 'patient']);
        $doctor->givePermissionTo(
            'dashboard',
            'prescription rx list',
            'prescription create',
            'prescription archive',
            'booking create',
            'booking view',
            'booking archive',
            'feedback',
            'survey'
        );

        // Adding permissions via a role
        User::where('name', 'like', 'Admin')->first()->assignRole('super-admin');
        User::where('name', 'like', 'BranchAdmin')->first()->assignRole('branch-admin');
        User::where('name', 'like', 'BranchDoctor1')->first()->assignRole('doctor');
        User::where('name', 'like', 'BranchDoctor2')->first()->assignRole('doctor');
        User::where('name', 'like', 'Patient1')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient2')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient3')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient4')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient5')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient6')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient7')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient8')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient9')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient10')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient111')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient12')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient13')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient14')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient15')->first()->assignRole('patient');
        User::where('name', 'like', 'Patient16')->first()->assignRole('patient');
    }
}
