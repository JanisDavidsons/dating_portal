<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {

    $gender = $faker->randomElement(['male','female']);

    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'age' => random_int(18,45),
        'gender' => $gender,
        'email' => $faker->email,
        'email_verified_at' => now(),
        'password' => $faker->password, // password
        'remember_token' => Str::random(10),
    ];
});
