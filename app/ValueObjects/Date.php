<?php

namespace App\ValueObjects;

use Carbon\Carbon;

class Date
{
    public static function readable(string $date): string
    {
        return Carbon::parse($date)->calendar();
    }

    public static function human_talk(string $date): string
    {
        return Carbon::parse($date)->calendar();
    }

    public static function diff_for_humans(string $date): string
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
