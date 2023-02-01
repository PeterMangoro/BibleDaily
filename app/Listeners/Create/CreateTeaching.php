<?php

namespace App\Listeners\Create;

use App\Events\Create\CreatingTeaching;
use App\Models\BibleSession;
use App\Models\Teaching;
use App\Services\BibleSessionService;
use App\Services\CategoryService;
use App\Services\ReadingService;
use App\Services\TeachingService;
use Illuminate\Support\Facades\DB;

class CreateTeaching
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
     * @param  \App\Events\Create\CreatingTeaching  $event
     *
     * @return void
     */
    public function handle(CreatingTeaching $event): void
    {
        $request = $event->request;

        DB::transaction(function () use ($request) {
            $id = BibleSessionService::new_session();
            $bible_session = BibleSession::find($id);
            TeachingService::new_teaching($bible_session, $request);
            ReadingService::new_reading($bible_session, $request);
            $teaching = Teaching::latest()->first();
            CategoryService::for_model($teaching, $request->categories);
        });
    }
}
