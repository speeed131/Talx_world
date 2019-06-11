<?php

use Illuminate\Database\Seeder;

class Comment_MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment_messages')->insert([
            'user_post_id' => 1,
            'user_id' => 2,
            'message_text' => 'testestestestestestes'
        ],
        [
            'user_post_id' => 2,
            'user_id' => 3,
            'message_text' => 'testestestestestestes'
        ],
        [
            'user_post_id' => 3,
            'user_id' => 1,
            'message_text' => 'testestestestestestes'
        ]);
    }
}