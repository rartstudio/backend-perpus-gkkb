<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategoriesBook;
use Faker\Generator as Faker;

$factory->define(CategoriesBook::class, function (Faker $faker) {
    return [
        'cbo_name' => $faker->name,
    ];
});
