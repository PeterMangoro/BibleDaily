<?php

namespace App\View\Teaching;

use App\DataObjects\Display\DisplayTeachingData;
use App\Models\BibleSession;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class TeachingWelcomeShowProps extends BaseView
{
    public $session;
    public function __construct(
        public readonly string $slug,
    ) {
        $this->session = BibleSession::whereRelation('teaching', 'slug', $slug)->first();
    }

    public function teaching()
    {
        return // TeachingHandler::get_teaching(
            DisplayTeachingData::from($this->session->teaching, $this->session->reading);
        // );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
