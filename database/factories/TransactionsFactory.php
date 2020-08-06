<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Members;
use App\Transactions;
use App\User;
use Faker\Generator as Faker;

$factory->define(Transactions::class, function (Faker $faker) {
    return [
        'member_id' => Members::inRandomOrder()->first()->id,
        'user_id' => User::inRandomOrder()->first()->id,
        'qty_ttl' => 5,
    ];
});
