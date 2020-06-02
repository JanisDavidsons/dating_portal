<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Picture;
use Faker\Generator as Faker;

$factory->define(
    Picture::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'caption' => $name,
        'location' => 'https://fakeimg.pl/350x200/?text='.$name.'&font=lobster'
    ];
});






