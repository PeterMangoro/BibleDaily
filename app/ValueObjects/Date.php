<?php

namespace App\ValueObjects;

use Carbon\Carbon;

class Date
{
    public static function readable(string $date): string
    {
        return Carbon::parse($date)->calendar();
    }
    
}
