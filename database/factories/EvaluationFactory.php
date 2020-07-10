<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Evaluation;
use Faker\Generator as Faker;

$factory->define(Evaluation::class, function (Faker $faker) {
  return [
    'idea_id' => $faker->numberBetween($min = 1, $max = 50),
    'user_id' => $faker->numberBetween(1, 5),
    'idea_review' => $faker->realText($faker->numberBetween(30, 200)),
    'five_rank' => $faker->numberBetween(1, 5),
    'created_at' => $faker->dateTimeThisDecade()
  ];
});
