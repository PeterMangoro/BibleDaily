<?php
namespace App\View\Reading;

use App\Models\BibleBook;
use Djunehor\Logos\Bible;
use App\View\Shared\Filters;
use App\View\Shared\BaseView;

class ReadingCreateProps extends BaseView
{
    public function books()
    {
        return (BibleBook::toBase()->select('title','chapters','testament')->get()->groupBy('testament'));
    }

    public function bible()
    {
        $v= new Bible();
        $v->book(request('book')?:'Psalms');
        $v->chapter(request('chapter')?:23);
        return $v->getChapter();
    }

    public function filters()
    {
        return Filters::bible();
    }
}