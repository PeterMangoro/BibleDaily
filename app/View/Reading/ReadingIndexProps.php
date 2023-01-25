<?php
namespace App\View\Reading;

use App\Models\Reading;
use App\View\Shared\Filters;
use App\Handlers\ReadingHandler;
use App\DataObjects\Display\DisplayReadingData;

class ReadingIndexProps
{
    public function readings()
    {
        return ReadingHandler::get_readings(
            Reading::belongsToAuthUser(),
            9)
            ->through(fn ($reading)=>[
                DisplayReadingData::from($reading)
            ]);
    }

    public function filters()
    {
        return Filters::filters();
    }
}