<?php

namespace App\View\Teaching;

use App\View\Shared\Filters;
use App\Handlers\TeachingHandler;
use App\DataObjects\Display\DisplayTeachingData;
use App\Models\BibleSession;
use App\View\Shared\BaseView;

class TeachingWelcomeIndexProps extends BaseView
{
    public $session;
    public function __construct()
    {
        $this->session = BibleSession::with('teachings', 'readings')->get();
    }

    public function teaching()
    {
        return TeachingHandler::get_teaching(
            DisplayTeachingData::from($this->session->teachings, $this->session->readings)
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
