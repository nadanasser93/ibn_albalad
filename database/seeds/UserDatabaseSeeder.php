<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        $admin_id = \DB::table('users')->insertGetId([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),

            //  'confirmed_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


    }
}
