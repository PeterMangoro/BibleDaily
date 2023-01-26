<?php

namespace App\Listeners\Update;

use App\Models\Reading;
use App\Services\ReadingService;
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
    public function handle(UpdatingTeaching $event):void
    {
        $teaching = $event->teaching;
        $request = $event->request;
        $reading = (new Reading())->findBibleSession($teaching->bible_session_id);
        
        TeachingService::update_teaching($teaching, $request);
        ReadingService::update_reading($reading, $request);
    }
}
