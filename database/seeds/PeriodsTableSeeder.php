<?php

use Illuminate\Database\Seeder;
use App\Period;
use Carbon\Carbon;

class PeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periods = [
            [
                'name'       => 'week',
                'number'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'       => 'month',
                'number'     => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  => 'year',
                'number'=> 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        foreach ($periods as $period) {
            Period::firstOrCreate(['name' => $period['name']], $period);
        }
    }
}
