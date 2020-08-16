<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategoriesState;
use App\Members;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Members::class, function (Faker $faker) {

    $firstName = $faker->firstName(['male']);
    $lastName = $faker->lastName(['male']);
    $fullName = $firstName.' '.$lastName;
    $slug = Str::slug($fullName);

    return [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'slug' => $slug,
        'date_of_birth' => now(),
        'gender' => $faker->randomElement(['Pria','Wanita']),
        'phone_number' => $faker->phoneNumber,
        'cst_id' => CategoriesState::inRandomOrder()->first()->id,
        'no_cst' => $faker->phoneNumber,
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});
