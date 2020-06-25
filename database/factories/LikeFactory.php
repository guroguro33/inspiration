<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
      'user_id' => $faker->numberBetween($min = 1, $max = 5),
      'idea_id' => $faker->numberBetween($min = 1, $max = 15)
    ];
});
