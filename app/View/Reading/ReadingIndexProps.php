<?php

namespace App\View\Reading;

use App\DataObjects\Display\DisplayReadingData;
use App\Handlers\ReadingHandler;
use App\Models\Reading;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;
use Illuminate\Pagination\LengthAwarePaginator;

class ReadingIndexProps extends BaseView
{
    public function readings():LengthAwarePaginator
    {
        return ReadingHandler::get_readings(
            (new Reading)->belongsToAuthUser(),
            9
        )
            ->through(fn ($reading) => 
                DisplayReadingData::from($reading),
            );
    }

    /**
     * @return array<int , string>
     */
    public function filters()
    {
        return Filters::filters();
    }
}
