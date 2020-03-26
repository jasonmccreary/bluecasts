<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'content' => $faker->paragraphs(3, true),
        'approved' => $faker->boolean,
    ];
});
