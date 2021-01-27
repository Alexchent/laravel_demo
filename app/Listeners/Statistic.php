<?php

namespace App\Listeners;

use App\Events\NewStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Statistic
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event instanceof NewStatus) {
            if (rand(1,10) > 1) Cache::increment('status_count');
            if (rand(1,10) == 1) Cache::put('status_count', Auth::user()->statuses()->count());
        }
    }
}
