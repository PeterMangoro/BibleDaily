<?php
namespace App\View\Teaching;

use App\View\Shared\Filters;
use App\Handlers\TeachingHandler;
use App\DataObjects\Display\DisplayTeachingData;
use App\Models\BibleSession;
use App\View\Shared\BaseView;

class TeachingIndexProps extends BaseView
{
    public function teachings()
    {
        return TeachingHandler::get_teachings(
            BibleSession::belongsToAuthUser()->with('teaching','reading'),
            9)
            ->through(fn ($session)=>[
                DisplayTeachingData::from($session->teaching,$session->reading)
            ]);
    }

    public function filters()
    {
        return Filters::filters();
    }
}