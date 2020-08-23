<?php

use App\Authors;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AuthorsSeeder::class);
        $this->call(CategoriesBookSeeder::class);
        $this->call(CategoriesStateSeeder::class);
        $this->call(PublisherSeeder::class);
        $this->call(BooksSeeder::class);
        $this->call(MembersSeeder::class);
        $this->call(TransactionsSeeder::class);
        $this->call(TransactionDetailSeeder::class);
        $this->call(RecomendationBooksSeeder::class);
        $this->call(ReviewBooksSeeder::class);
    }
}
