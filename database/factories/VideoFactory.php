<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'synopsis' => $faker->text,
        'duration' => $faker->randomFloat(2, 0, 999999.99),
    ];
});
