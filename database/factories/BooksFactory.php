<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Authors;
use App\Books;
use App\CategoriesBook;
use App\Publisher;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Books::class, function (Faker $faker) {
    $randomNumber = rand(1,100);
    $cover = "https://picsum.photos/id/{$randomNumber}/200/300";

    $title = $faker->sentence(4);
    $slug = Str::slug($title);

    return [
        'pub_id' => Publisher::inRandomOrder()->first()->id,
        'author_id' => Authors::inRandomOrder()->first()->id,
        'cbo_id' => CategoriesBook::inRandomOrder()->first()->id,
        'title' => $title,
        'slug' => $slug,
        'description' => $faker->sentence(12),
        'qty' => rand(10,50),
        'cover' =>$cover,
        'admin_id' => 1
    ];
});
