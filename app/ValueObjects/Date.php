<?php

namespace App\ValueObjects;

use Carbon\Carbon;

class Date
{   
    public static function readable($date):string
    {
        return Carbon::parse($date)->toDayDateTimeString();
    }
}
