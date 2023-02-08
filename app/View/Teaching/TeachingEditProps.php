<?php

namespace App\View\Teaching;

use App\DataObjects\Display\DisplayTeachingData;
use App\Models\BibleBook;
use App\Models\BibleSession;
use App\Models\Category;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;
use Djunehor\Logos\Bible;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class TeachingEditProps extends BaseView
{
    public object $session;

    public function __construct(
        public readonly string $slug,
    ) {
        $this->session =
            BibleSession::whereRelation('teaching', 'slug', $slug)->first();
    }

    public function teaching(): DisplayTeachingData
    {
        return DisplayTeachingData::from(
            $this->session->teaching,
            $this->session->reading,
            Auth::user()->name
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
