<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Watch;
use Faker\Generator as Faker;

$factory->define(Watch::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'video_id' => factory(\App\Video::class),
        'completed_at' => $faker->dateTime(),
    ];
});
