<?php

namespace App\View\Teaching;

use App\DataObjects\Display\DisplayTeachingData;
use App\Models\BibleSession;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class TeachingWelcomeIndexProps extends BaseView
{
    public $session;
    public function __construct()
    {
        $this->session = BibleSession::with('teaching', 'reading')->paginate();
    }

    public function teaching()
    {
        return $this->session->through(fn ($session) => [
            DisplayTeachingData::from($session->teaching, $session->reading),
        ]);
    }

    public function filters()
    {
        return Filters::filters();
    }
}
