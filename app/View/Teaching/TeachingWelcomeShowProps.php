<?php

namespace App\View\Teaching;

use App\DataObjects\Display\DisplayTeachingData;
use App\Models\BibleSession;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class TeachingWelcomeShowProps extends BaseView
{
    public object $session;
    public function __construct(
        public readonly string $slug,
    ) {
        $this->session = BibleSession::whereRelation('teaching', 'slug', $slug)->first();
    }

    public function teaching(): object
    {
        return // TeachingHandler::get_teaching(
            DisplayTeachingData::from($this->session->teaching, $this->session->reading);
        // );
    }

    /**
     * @return array<int , string>
     */
    public function filters(): array
    {
        return Filters::filters();
    }
}
