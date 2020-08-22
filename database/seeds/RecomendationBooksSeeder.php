<?php

use Illuminate\Database\Seeder;

class RecomendationBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\RecomendationBooks::class,10)->create();
    }
}
