<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Evaluation;
use Faker\Generator as Faker;

$factory->define(Evaluation::class, function (Faker $faker) {
  return [
    'idea_id' => $faker->numberBetween($min = 1, $max = 15),
    'user_id' => $faker->numberBetween(1, 5),
    'idea_review' => $faker->paragraphs($nb = $faker->numberBetween(1,3), $asText = true),
    'five_rank' => $faker->numberBetween(1, 5)
  ];
});
