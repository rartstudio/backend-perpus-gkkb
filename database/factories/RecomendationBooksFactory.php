<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Books;
use App\RecomendationBooks;
use Faker\Generator as Faker;

$factory->define(RecomendationBooks::class, function (Faker $faker) {

    return [
        'book_id' => Books::inRandomOrder()->first()->id,
        'started_at' => now(),
        'ended_at' => now()
    ];
});