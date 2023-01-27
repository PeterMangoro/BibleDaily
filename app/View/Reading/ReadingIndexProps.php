<?php

namespace App\View\Reading;

use App\DataObjects\Display\DisplayReadingData;
use App\Handlers\ReadingHandler;
use App\Models\Reading;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class ReadingIndexProps extends BaseView
{
    public function readings()
    {
        return ReadingHandler::get_readings(
            Reading::belongsToAuthUser(),
            9
        )
            ->through(fn ($reading) => 
                DisplayReadingData::from($reading),
            );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
