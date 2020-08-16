<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Authors;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Authors::class, function (Faker $faker) {

    $title = $faker->name;
    $slug = Str::slug($title);

    return [
        'author_name' => $title,
        'slug' => $slug
    ];
});
