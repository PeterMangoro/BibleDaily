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

}