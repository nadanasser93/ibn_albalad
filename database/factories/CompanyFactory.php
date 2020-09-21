<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\City;
use App\Models\Company;
use Faker\Generator as Faker;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Company::class, function (Faker $faker) {
    $image = $faker->image();
    $imageFile = new File($image);
    return [
        'company_name' => $faker->name,
         'address' => $faker->address,
         'description' => $faker->sentence(10),
         'image' => Storage::disk('public')->putFile('images', $imageFile),
         'city_id'=>City::all(['id'])->random(),
         'phone'=> $faker->phoneNumber,
    ];
});
