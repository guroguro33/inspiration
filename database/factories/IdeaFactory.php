<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Idea;
use Faker\Generator as Faker;

$factory->define(Idea::class, function (Faker $faker) {
  return [
    'user_id' => $faker->numberBetween($min=1, $max=5),
    'category_id' => $faker->numberBetween(1, 7),
    'idea_title' => $faker->realText($faker->numberBetween(20, 100)),
    'idea_description' => $faker->realText($faker->numberBetween(100, 400)),
    // 'idea_detail' => $faker->paragraphs($faker->numberBetween(4,8), true),
    'idea_detail' => $faker->realText($faker->numberBetween(500, 1000)),
    'idea_price' => $faker->numberBetween(10, 9999999),
    'created_at' => $faker->dateTimeThisDecade()
  ];
});
