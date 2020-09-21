<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\City;
use App\Models\CityJob;
use App\Models\Job;
use Faker\Generator as Faker;
use Illuminate\Http\File;

$factory->define(CityJob::class, function (Faker $faker) {
    $image = $faker->image();
    $imageFile = new File($image);
    return [
        'company_name' => $faker->name,
        'company_address' => $faker->address,
        'company_description' => $faker->sentence(10),
        'image' => Storage::disk('public')->putFile('images', $imageFile),
        'company_phone'=> $faker->phoneNumber,
        'city_id'=>City::all(['id'])->random(),
        'job_id'=>Job::all(['id'])->random(),
    ];
});
