<?php

namespace App\View\Reading;

use App\DataObjects\Display\DisplayReadingData;
use App\Models\BibleBook;
use App\Models\Category;
use App\Models\Reading;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;
use Djunehor\Logos\Bible;
use Illuminate\Support\Collection;

class ReadingEditProps extends BaseView
{
    public function __construct(
        public readonly Reading $reading,
    ) {
    }

    public function reading(): DisplayReadingData
    {
        return DisplayReadingData::from(
            $this->reading,
        );
    }

    public function books(): Collection
    {
        return BibleBook::toBase()
            ->select('title', 'chapters', 'testament')
            ->get()
            ->groupBy('testament');
    }

    public function categories(): Collection
    {
        return Category::toBase()
            ->select('id', 'title')
            ->orderBy('title')
            ->get();
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
