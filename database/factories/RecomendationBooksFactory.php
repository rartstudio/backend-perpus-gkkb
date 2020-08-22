<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Books;
use App\RecomendationBooks;
use Faker\Generator as Faker;

$factory->define(RecomendationBooks::class, function (Faker $faker) {

    return [
        'book_id' => Books::inRandomOrder()->first()->id,
        'status' => $faker->numberBetween(0,1)
    ];
});
