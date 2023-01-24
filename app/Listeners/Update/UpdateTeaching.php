<?php

namespace App\Listeners\Update;

use App\Services\TeachingService;
use App\Events\Update\UpdatingTeaching;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateTeaching
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
     * @param  \App\Events\Update\UpdatingTeaching  $event
     * @return void
     */
    public function handle(UpdatingTeaching $event)
    {
        $teaching = $event->teaching;
        $request = $event->request;
        TeachingService::update_teaching($teaching, $request);
    }
}
