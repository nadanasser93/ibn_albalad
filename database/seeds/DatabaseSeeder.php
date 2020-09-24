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
       // $this->call(RolesTableSeeder::class);
                $this->call(UserDatabaseSeeder::class);
         $this->call(PeriodsTableSeeder::class);
         $this->call(SubscriptionsTableSeeder::class);
       // $this->call(RolesTableSeeder::class);

    }
}
