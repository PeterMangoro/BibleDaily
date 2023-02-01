<?php

namespace App\Listeners\Create;

use App\Events\Create\CreatingReading;
use App\Models\BibleSession;
use App\Services\BibleSessionService;
use App\Services\ReadingService;
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
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Create\CreatingReading  $event
     *
     * @return void
     */
    public function handle(CreatingReading $event): void
    {
        $request = $event->request;

        DB::transaction(function () use ($request) {
            $id = BibleSessionService::newSession();
            $bible_session = BibleSession::find($id);
            ReadingService::newReading($bible_session, $request);
        });
    }
}
