<?php

use Illuminate\Database\Seeder;

class ReviewBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ReviewBooks::class,200)->create();
    }
}
