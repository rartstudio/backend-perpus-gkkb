<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategoriesBook;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(CategoriesBook::class, function (Faker $faker) {

    $title = $faker->sentence(2);
    $slug = Str::slug($title);

    return [
        'cbo_name' => $title,
        'slug' => $slug
    ];
});
