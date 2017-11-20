<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'name' => 'super-admin',
                'display_name' => 'Super Admin',
                'description' => 'Enoch & Maryam, the developers of this project',
            ],
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Core Stream administration',
            ],
            [
                'name' => 'subscriber',
                'display_name' => 'Subscriber',
                'description' => 'Event hosts and simple users',
            ]
        ];

        foreach ($role as $key => $value)
        {
            Role::create($value);
        }
    }
}