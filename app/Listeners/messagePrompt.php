<?php

namespace App\Listeners;

use App\Events\messageReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class messagePrompt
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
     * @param  messageReceived  $event
     * @return void
     */
    public function handle(messageReceived $event)
    {
        //
    }
}
