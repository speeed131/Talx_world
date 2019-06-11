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
        $this->call(UsersTableSeeder::class);
        $this->call(Comment_User_PostsTableSeeder::class);
        $this->call(Comment_MessagesTableSeeder::class);

    }
}
