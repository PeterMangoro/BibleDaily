<?php

namespace App\Listeners\Create;

use App\Events\Create\CreatingReading;
use App\Models\BibleSession;
use App\Services\BibleSessionService;
use App\Services\ReadingService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class CreateReading
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
     * @param  \App\Events\Create\CreatingReading  $event
     * @return void
     */
    public function handle(CreatingReading $event)
    {
        $request = $event->request;

        DB::transaction(function () use ($request) {
            $id = BibleSessionService::new_session();
            $bible_session = BibleSession::find($id);
            ReadingService::new_reading($bible_session, $request);
        });
    }
}
