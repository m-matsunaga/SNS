<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follows')->insert([
            [
            'following_id' => '36',
            'followed_id' => '25'],
            [
            'following_id' => '35',
            'followed_id' => '36'],
            [
            'following_id' => '25',
            'followed_id' => '36'],
        ]);
    }
}
