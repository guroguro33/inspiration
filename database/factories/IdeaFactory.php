<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Idea;
use Faker\Generator as Faker;

$factory->define(Idea::class, function (Faker $faker) {
  return [
    'user_id' => $faker->numberBetween($min=1, $max=5),
    'category_id' => $faker->numberBetween(1, 7),
    'idea_title' => $faker->realText($faker->numberBetween(10, 50)),
    'idea_description' => $faker->paragraphs($nb = $faker->numberBetween(2,4), $asText = true),
    'idea_detail' => $faker->paragraphs($faker->numberBetween(4,8), true),
    'idea_price' => $faker->numberBetween(100, 1000000),
    'created_at' => $faker->dateTimeThisDecade()
  ];
});
