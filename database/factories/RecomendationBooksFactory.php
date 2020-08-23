<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Books;
use App\RecomendationBooks;
use Faker\Generator as Faker;

$factory->define(RecomendationBooks::class, function (Faker $faker) {

    $id = Books::inRandomOrder()->first()->id;
    $slug = Books::where('id',$id)->first()->slug;

    return [
        'book_id' => $id,
        'slug' => $slug,
        'started_at' => now(),
        'ended_at' => now(),
        'status' => $faker->numberBetween(0,1)
    ];
});
