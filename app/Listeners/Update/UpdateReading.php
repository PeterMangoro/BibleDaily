<?php

namespace App\Listeners\Update;

use App\Services\ReadingService;
use App\Events\Update\UpdatingReading;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateReading
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
     * @param  \App\Events\Update\UpdatingReading  $event
     * @return void
     */
    public function handle(UpdatingReading $event):void
    {
        $reading = $event->reading;
        $request = $event->request;
        ReadingService::update_reading($reading, $request);
    }
}
