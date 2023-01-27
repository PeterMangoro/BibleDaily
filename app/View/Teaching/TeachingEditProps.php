<?php

namespace App\View\Teaching;

use App\DataObjects\Display\DisplayTeachingData;
use App\Handlers\TeachingHandler;
use App\Models\Teaching;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class TeachingEditProps extends BaseView
{
    public $session;
    public function __construct(
        public readonly string $slug,
    ) {
        $this->session = Teaching::where('slug', $slug)->with('teaching', 'reading')->first();
    }

    public function teaching()
    {
        return TeachingHandler::get_teaching(
            DisplayTeachingData::from($this->session->teaching, $this->session->reading)
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
