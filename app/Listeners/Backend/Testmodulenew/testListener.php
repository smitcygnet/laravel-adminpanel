<?php

namespace App\Listeners\Backend\Testmodulenew;

use App\Events\Backend\Testmodulenew\test;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class testListener
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
     * @param  test  $event
     * @return void
     */
    public function handle(test $event)
    {
        //
    }
}
