<?php

namespace App\View\Teaching;

use App\DataObjects\Display\DisplayTeachingData;
use App\Handlers\TeachingHandler;
use App\Models\BibleSession;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;
use Illuminate\Pagination\LengthAwarePaginator;

class TeachingIndexProps extends BaseView
{
    public function teachings():LengthAwarePaginator
    {
        return TeachingHandler::get_teachings(
            BibleSession::belongsToAuthUser()->with('teaching', 'reading'),
            9
        )
            ->through(fn ($session) => [
                DisplayTeachingData::from($session->teaching, $session->reading),
            ]);
    }

    /**
     * @return array<int , string>
     */
    public function filters():array
    {
        return Filters::filters();
    }
}
