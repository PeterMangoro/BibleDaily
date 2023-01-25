<?php

namespace App\View\Teaching;

use App\View\Shared\Filters;
use App\Handlers\TeachingHandler;
use App\DataObjects\Display\DisplayTeachingData;
use App\Models\Teaching;

class TeachingWelcomeIndexProps
{
    public $session;
    public function __construct(
        public readonly string $slug,
    ) {
        $this->session = Teaching::where('slug', $slug)->with('teachings', 'readings')->first();
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
