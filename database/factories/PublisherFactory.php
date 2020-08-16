<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Publisher;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Publisher::class, function (Faker $faker) {

    $title = $faker->name;
    $slug = Str::slug($title);

    return [
        'pub_name' => $title,
        'slug' => $slug
    ];
});
