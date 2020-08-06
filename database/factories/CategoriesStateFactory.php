<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategoriesState;
use Faker\Generator as Faker;

$factory->define(CategoriesState::class, function (Faker $faker) {
    return [
        'cst_name' => $faker->name,
    ];
});
