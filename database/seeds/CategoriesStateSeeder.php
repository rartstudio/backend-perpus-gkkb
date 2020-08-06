<?php

use Illuminate\Database\Seeder;

class CategoriesStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CategoriesState::class,3)->create();
    }
}
