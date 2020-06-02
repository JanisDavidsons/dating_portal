<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {

    return [
        'username' => $faker->name,
        'description' => $faker->text,
        'facebook' =>  $faker->url,
    ];
});
