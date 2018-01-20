<?php

namespace App\Listeners;

use App\Events\ButtonPressEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ButtonPressListner
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
     * @param  ButtonPressEvent  $event
     * @return void
     */
    public function handle(ButtonPressEvent $event)
    {
        //
    }
}
