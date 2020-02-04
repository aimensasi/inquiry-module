<?php

use Faker\Generator as Faker;
use Modules\Inquiry\Entities\Inquiry;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Inquiry::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'email' => $faker->unique()->safeEmail,
    'message' => $faker->text(16383),
    'subject' => $faker->text(47),
    'created_at' => $faker->dateTime,
    'updated_at' => $faker->dateTime,
  ];
});
