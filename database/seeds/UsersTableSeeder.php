<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //生成50个用户
        factory(User::class)->times(50)->create();

        $user = User::first();
        $user->name = 'Alex';
        $user->email = '1023615292@qq.com';
        $user->save();
    }
}
