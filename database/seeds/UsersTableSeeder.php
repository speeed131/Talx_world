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
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),
            'user_image' => '',
            'user_nationality' => '日本',
            'user_learning_language' => '英語',
            'user_topic' => 'ゲーム',
            'user_introduce' => 'testtesttesttesttestettestestetsetststsetstsetestsetse',
        ]);
        DB::table('users')->insert([
            'name' => 'daiki',
            'email' => 'daiki@daiki.com',
            'password' => bcrypt('daiki'),
            'user_image' => '',
            'user_nationality' => 'daiki',
            'user_learning_language' => 'daiki',
            'user_topic' => 'ゲーム',
            'user_introduce' => 'testtesttesttesttestettestestetsetststsetstsetestsetse',
        ]);
        DB::table('users')->insert([
            'name' => 'test3',
            'email' => 'test3@test.com',
            'password' => bcrypt('test3'),
            'user_image' => '',
            'user_nationality' => 'test3',
            'user_learning_language' => 'test3',
            'user_topic' => 'ゲーム',
            'user_introduce' => 'testtesttesttesttestettestestetsetststsetstsetestsetse',
        ]);
    }
}
