<?php
namespace App\View\Reading;

use App\Models\BibleBook;
use Djunehor\Logos\Bible;
use App\View\Shared\Filters;
use App\View\Shared\BaseView;
use Illuminate\Support\Collection;

class ReadingCreateProps extends BaseView
{
    public function books():Collection
    {
        return (BibleBook::toBase()->select('title','chapters','testament')->get()->groupBy('testament'));
    }

    /**
     * @return array<int , string>
     */
    public function bible():array
    {
        $v= new Bible();
        $v->book(request('book')?:'Psalms');
        $v->chapter(request('chapter')?:23);
        return $v->getChapter();
    }

    /**
     * @return array<int , string>
     */
    public function filters():array
    {
        return Filters::bible();
    }
}