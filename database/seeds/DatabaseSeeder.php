<?php

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
        // $this->call(UsersTableSeeder::class);
        factory(App\Post::class,30)->create();
        factory(App\Category::class,30)->create();
        factory(App\User::class,30)->create();
    }
}
