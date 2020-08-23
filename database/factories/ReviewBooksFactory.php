<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Books;
use App\Model;
use App\ReviewBooks;
use App\User;
use Faker\Generator as Faker;

$factory->define(ReviewBooks::class, function (Faker $faker) {

    return [
        'user_id' => User::inRandomOrder()->first()->id,
        'book_id' => Books::inRandomOrder()->first()->id,
        'comment' => $faker->sentence(2),
        'rating' => $faker->numberBetween(3,5)
    ];
});
