<?php

use Illuminate\Database\Seeder;
use App\Period;
use Carbon\Carbon;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions = [
            [
                'period_id'   => Period::find(1)->id,
                'name'        => 'Weekabonnement',
                'description' => 'Omschrijving weekabonnement',
                'most_chosen' => false,
                'image'       => 'image1.png',
                'price_incl'=> '6.95',
                'price_excl'=> '5.75',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'period_id'   => Period::find(2)->id,
                'name'        => 'Maandabonnement',
                'description' => 'Omschrijving maandabonnement',
                'most_chosen' => true,
                'price_incl'=> '9.95',
                'price_excl'=> '8.25',
                'image'       => 'image2.png',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'period_id'   => Period::find(3)->id,
                'name'        => 'Jaarabonnement',
                'description' => 'Omschrijving jaarabonnement',
                'most_chosen' => false,
                'price_incl'=> '19.95',
                'price_excl'=> '16.50',
                'image'       => 'image3.png',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];
        foreach ($subscriptions as $subscription) {
            \App\Models\Subscription::firstOrCreate(['name' => $subscription['name']], $subscription);
        }
    }
}
