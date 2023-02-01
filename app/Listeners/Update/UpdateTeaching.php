<?php

namespace App\Listeners\Update;

use App\Events\Update\UpdatingTeaching;
use App\Models\Reading;
use App\Services\CategoryService;
use App\Services\ReadingService;
use App\Services\TeachingService;

class UpdateTeaching
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Update\UpdatingTeaching  $event
     *
     * @return void
     */
    public function handle(UpdatingTeaching $event): void
    {
        $teaching = $event->teaching;
        $request = $event->request;
        $reading = (new Reading())->findBibleSession($teaching->bible_session_id);

        TeachingService::updateTeaching($teaching, $request);
        ReadingService::updateReading($reading, $request);
        $request->categories ? CategoryService::forModel($teaching, $request->categories) : null;
    }
}
