<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategoriesState;
use App\Members;
use App\User;
use Faker\Generator as Faker;

$factory->define(Members::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'date_of_birth' => now(),
        'gender' => $faker->randomElement(['Pria','Wanita']),
        'phone_number' => $faker->phoneNumber,
        'cst_id' => CategoriesState::inRandomOrder()->first()->id,
        'no_cst' => $faker->phoneNumber,
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});
