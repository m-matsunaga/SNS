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
            [
            'username' => 'るき',
            'mail' => 'ruki.@gmail.com',
            'password' => 'ruki0000',
            'bio' => 'るきです、よろしくお願いします！',
            'images' => 'icon2.png'],
            [
            'username' => 'なな',
            'mail' => 'nana.@gmail.com',
            'password' => 'nana0000',
            'bio' => 'ななです、よろしくお願いします！',
            'images' => 'icon3.png'],
            [
            'username' => 'はると',
            'mail' => 'haruto.@gmail.com',
            'password' => 'haruto0000',
            'bio' => 'はるとです、よろしくお願いします！',
            'images' => 'icon4.png'],
            [
            'username' => 'かりん',
            'mail' => 'karin.@gmail.com',
            'password' => 'karin0000',
            'bio' => 'かりんです、よろしくお願いします！',
            'images' => 'icon5.png'],
            [
            'username' => 'ゆうご',
            'mail' => 'yugo.@gmail.com',
            'password' => 'yugo0000',
            'bio' => 'ゆうごです、よろしくお願いします！',
            'images' => 'icon6.png'],
            [
            'username' => 'たつき',
            'mail' => 'tatsuki.@gmail.com',
            'password' => 'tatsuki0000',
            'bio' => 'たつきです、よろしくお願いします！',
            'images' => 'icon7.png'],
        ]);
    }
}
