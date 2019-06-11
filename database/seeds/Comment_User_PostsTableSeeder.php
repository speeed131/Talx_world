<?php

use Illuminate\Database\Seeder;

class Comment_User_PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment_user_posts')->insert([
            'user_id' => 1
        ],
        [
            'user_id' => 2
        ],
        [
            'user_id' => 3
            
        ]);
    }
}
