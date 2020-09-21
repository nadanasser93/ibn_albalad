<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\File;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    $image = $faker->image();
    $imageFile = new File($image);
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'description' => $faker->sentence(10),
        'image' => Storage::disk('public')->putFile('images', $imageFile),
        'phone'=> $faker->phoneNumber,
    ];
});
