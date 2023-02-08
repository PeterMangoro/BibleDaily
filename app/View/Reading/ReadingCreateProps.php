<?php

namespace App\View\Reading;

use App\Models\BibleBook;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;
use Djunehor\Logos\Bible;
use Illuminate\Support\Collection;

class ReadingCreateProps extends BaseView
{
    public function books(): Collection
    {
        return BibleBook::toBase()
            ->select('title', 'chapters', 'testament')
            ->get()
            ->groupBy('testament');
    }

    /**
     * @return array<int , string>
     */
    public function bible(): array|null
    {
        $bible = new Bible();
        $bible->book(request('book') ?? 'Psalms');
        $bible->chapter(request('chapter') ?? 1);
        return $bible->getChapter();
    }

    /**
     * @return array<int , string>
     */
    public function filters(): array
    {
        return Filters::bible();
    }
}
