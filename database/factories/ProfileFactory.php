<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {

    return [
        'username' => $faker->name,
        'description' => $faker->text,
        'facebook' =>  $faker->url,
        'min_age' =>  18,
        'max_age' =>  70,
    ];
});
