<?php

use Illuminate\Database\Seeder;

class FollowersTableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::all();
        $user = $users->first();

        $followers = $users->slice($user->id);
        $follower_ids = $followers->pluck('id')->toArray();

        //首位用户关注所有用户
        $user->follow($follower_ids);
        //所有用户关注首位用户
        foreach ($followers as $follower) {
            $follower->follow($user->id);
        }
    }
}
