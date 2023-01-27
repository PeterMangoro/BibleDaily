<?php

namespace App\View\Shared;

class Filters
{
    public static function filters()
    {
        return [
            'search' => request('search'),
            'column' => request('column'),
            'direction' => request('direction'),
        ];
    }

    public static function bible()
    {
        return [
            'book' => request('book'),
            'chapter' => request('chapter'),
            
        ];
    }
}
