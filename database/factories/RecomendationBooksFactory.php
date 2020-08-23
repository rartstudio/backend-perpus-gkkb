<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Books;
use App\RecomendationBooks;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(RecomendationBooks::class, function (Faker $faker) {

    $id = Books::inRandomOrder()->first()->id;
    $slug = Books::where('id',$id)->first()->slug;
    $date = Carbon::createFromDate('2020','08','23');
    $status = 1;

    return [
        'book_id' => $id,
        'slug' => $slug,
        'started_at' => $date,
        'ended_at' => $date,
        'status' => $status,
        'admin_id' => User::inRandomOrder()->first()->id,
    ];
});
