<?php
namespace App\View\Teaching;

use App\View\Shared\Filters;
use App\Handlers\TeachingHandler;
use App\DataObjects\Display\DisplayTeachingData;
use App\Models\BibleSession;

class TeachingIndexProps
{
    public function teachings()
    {
        return TeachingHandler::get_teachings(
            BibleSession::belongsToAuthUser()->with('teachings','readings'),
            9)
            ->through(fn ($session)=>[
                DisplayTeachingData::from($session->teachings,$session->readings)
            ]);
    }

    public function filters()
    {
        return Filters::filters();
    }
}