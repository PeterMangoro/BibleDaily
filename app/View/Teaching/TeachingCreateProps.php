<?php

namespace App\View\Teaching;

use App\Models\BibleBook;
use App\Models\Category;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;
use Djunehor\Logos\Bible;
use Illuminate\Support\Collection;

class TeachingCreateProps extends BaseView
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
        $bible->chapter(request('chapter') ?? 23);
        return $bible->getChapter();
    }

    public function categories(): Collection
    {
        return Category::toBase()->select('id', 'title')->get();
    }
    /**
     * @return array<int , string>
     */
    public function filters(): array
    {
        return Filters::bible();
    }
}
