<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Books;
use App\TransactionDetail;
use App\Transactions;
use Faker\Generator as Faker;

$factory->define(TransactionDetail::class, function (Faker $faker) {
    return [
        'transaction_id' => Transactions::inRandomOrder()->first()->id,
        'book_id' => Books::inRandomOrder()->first()->id,
        'qty' => 1
    ];
});
