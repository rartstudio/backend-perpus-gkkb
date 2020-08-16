<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategoriesState;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(CategoriesState::class, function (Faker $faker) {
    
    $title = $faker->sentence(2);
    $slug = Str::slug($title);

    return [
        'cst_name' => $title,
        'slug' => $slug
    ];
});
