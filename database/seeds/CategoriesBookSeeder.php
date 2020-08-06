<?php

use Illuminate\Database\Seeder;

class CategoriesBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CategoriesBook::class,10)->create();
    }
}
