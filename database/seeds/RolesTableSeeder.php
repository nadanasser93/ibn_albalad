<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;


class RolesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        // //
        $role = Role::findOrCreate(['name' => 'superadmin']);
        $role = Role::findOrCreate(['name' => 'admin']);
        $role = Role::findOrCreate(['name' => 'company']);
        $role = Role::findOrCreate(['name' => 'customer']);
    }
}
