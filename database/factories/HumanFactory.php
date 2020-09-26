<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Human;
use Faker\Generator as Faker;

$factory->define(Human::class, function (Faker $faker) {
    return [
        'name' => $faker->text($manNbChars=200),
        'nickname' => $faker->text($manNbChars=200),
        'email' => $faker->text($manNbChars=200),
        'phone' => $faker->text($manNbChars=200),
        'age' => $faker->numberBetween($min=18, $max=100),
        'menu_id' => $faker->randomDigitNotNull,
    ];
});
