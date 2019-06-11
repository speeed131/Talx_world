<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
            'user_name' => 'test',
            'user_email' => 'test@test.com',
            'user_password' => bcrypt('test'),
            'user_image' => '',
            'user_nationality' => '日本',
            'user_learning_language' => '英語',
            'user_topic' => 'ゲーム',
            'user_introduce' => 'testtesttesttesttestettestestetsetststsetstsetestsetse',
            
            
        ],
        [
            'user_name' => 'daiki',
            'user_email' => 'daiki@daiki.com',
            'user_password' => bcrypt('daiki'),
            'user_image' => '',
            'user_nationality' => 'daiki',
            'user_learning_language' => 'daiki',
            'user_topic' => 'ゲーム',
            'user_introduce' => 'testtesttesttesttestettestestetsetststsetstsetestsetse',
            
        ],
        [
            'user_name' => 'test3',
            'user_email' => 'test3@test.com',
            'user_password' => bcrypt('test3'),
            'user_image' => '',
            'user_nationality' => 'test3',
            'user_learning_language' => 'test3',
            'user_topic' => 'ゲーム',
            'user_introduce' => 'testtesttesttesttestettestestetsetststsetstsetestsetse',
            
        ]
        );
    }
}
