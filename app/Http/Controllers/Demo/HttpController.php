<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ActiveAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Pusher\Pusher;

class HttpController extends Controller
{
    public function demo()
    {
        $response = Http::withHeaders([
            'Content-type'=>'text/html',
            'charset'=>'utf-8'
        ])->get('http://wenda.golaravel.com/question/468');
//        $response = Http::get('http://loc-family.abdstem.com/banner');
        return $response->body();
    }

    public function fake()
    {
        Http::fake();

        Http::withHeaders([
            'X-First' => 'foo',
        ])->post('http://test.com/users', [
            'name' => 'Taylor',
            'role' => 'Developer',
        ]);

        Http::assertSent(function ($request) {
            return $request->hasHeader('X-First', 'foo') &&
                $request->url() == 'http://test.com/users' &&
                $request['name'] == 'Taylor' &&
                $request['role'] == 'Developer';
        });
    }

    public function notify(User $user)
    {
        $user->notify(new ActiveAccount($user));
    }

    public function pushNotification()
    {
        $pusherConfig = config('broadcasting.connections.pusher');

        $pusher = new Pusher($pusherConfig['key'], $pusherConfig['secret'], $pusherConfig['app_id'], ['cluster' => $pusherConfig['options']['cluster']]);
        $pusher->trigger('my-channel', 'my-event',array('message' => '太阳神'));
    }
}
