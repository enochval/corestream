<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin_role = Role::where('name', '=', 'super-admin')->first();

        $admin_role = Role::where('name', '=', 'admin')->first();

        $all_permissions = Permission::all();

        $super_admin = User::create([
            'full_name' => 'Super Admin',
            'email' => 'super-admin@touchcoreltd.com',
            'billing_address' => '14B Wole Ariyo, Off Admiralty way, Lekki Phase 1, Lagos',
            'phone' => '08063800482',
            'password' => bcrypt('super-admin'),
        ]);

        $admin = User::create([
            'full_name' => 'Admin',
            'email' => 'admin@corestream.com',
            'billing_address' => '14B Wole Ariyo, Off Admiralty way, Lekki Phase 1, Lagos',
            'phone' => '00000000000',
            'password' => bcrypt('admin'),
        ]);

        $super_admin->attachRole($super_admin_role);
        $admin->attachRole($admin_role);

        $super_admin_role->attachPermissions($all_permissions);
    }
}