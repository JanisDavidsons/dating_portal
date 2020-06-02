<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {

    /** @var \RandomUser\User $user */
    $generator = new \RandomUser\Generator();
    $user =$generator->getUser();

    return [
        'username' => $user->getUsername(),
        'description' => $user->getName(),
        'url' =>  $faker->url,
        'image' => $user->getPicture(),
    ];
});
