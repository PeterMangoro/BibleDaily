<?php

namespace App\ValueObjects;

use Carbon\Carbon;

class Date
{
    public static function between_now_and($date):string
    {
        return Carbon::parse($date)->diffForHumans([
            'parts' => 2,
            'short' => true,
            // 'aUnit'=>true
        ]);
    }

    public static function readable($date):string
    {
        return Carbon::parse($date)->toDayDateTimeString();
    }
}
