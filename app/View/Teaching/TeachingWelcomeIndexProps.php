<?php

namespace App\View\Teaching;

use App\DataObjects\Display\DisplayTeachingData;
use App\Models\BibleSession;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;
use Illuminate\Pagination\LengthAwarePaginator;

class TeachingWelcomeIndexProps extends BaseView
{
    public LengthAwarePaginator $session;
    public function __construct()
    {
        $this->session = BibleSession::with('teaching', 'reading')->paginate();
    }

    public function teaching():LengthAwarePaginator
    {
        return $this->session->through(fn ($session) => [
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
