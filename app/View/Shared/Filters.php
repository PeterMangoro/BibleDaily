<?php

namespace App\View\Shared;

class Filters
{

    /**
     * @return array<string>
     */
    public static function filters():array
    {
        return [
            'search' => request('search'),
            'column' => request('column'),
            'direction' => request('direction'),
        ];
    }

    /**
     * @return array<string>
     */
    public static function bible():array
    {
        return [
            'book' => request('book'),
            'chapter' => request('chapter'),
            
        ];
    }
}
