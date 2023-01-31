<?php

namespace App\View\Teaching;

use App\Models\BibleBook;
use Djunehor\Logos\Bible;
use App\Models\BibleSession;
use App\View\Shared\Filters;
use App\View\Shared\BaseView;
use App\Handlers\TeachingHandler;
use Illuminate\Support\Collection;
use App\DataObjects\Display\DisplayTeachingData;

class TeachingEditProps extends BaseView
{
    public $session;

    public function __construct(
        public readonly string $slug,
    ) {
        $this->session = BibleSession::whereRelation('teaching', 'slug', $slug)->first();
    }

    public function teaching()
    {
        return 
            DisplayTeachingData::from($this->session->teaching, $this->session->reading);
      
    }
  
    public function books(): Collection
    {
        return BibleBook::toBase()->select('title', 'chapters', 'testament')->get()->groupBy('testament');
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

    /**
     * @return array<int , string>
     */
    public function filters(): array
    {
        return Filters::bible();
    }
}
