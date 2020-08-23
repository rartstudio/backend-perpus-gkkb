<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Spatie\Permission\Models\Role::all() as $role) {
            $users = factory(App\User::class,30)->create();
            foreach($users as $user){
               $user->assignRole('user');
            }
         }
    }
}
