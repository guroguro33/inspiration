<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Purchase;
use Faker\Generator as Faker;

$factory->define(Purchase::class, function (Faker $faker) {
  return [
    'user_id' => $faker->numberBetween($min = 1, $max = 5),
    'idea_id' => $faker->numberBetween(1, 50),
    'created_at' => $faker->dateTimeThisDecade()
  ];
});
