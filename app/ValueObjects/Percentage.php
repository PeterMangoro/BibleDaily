<?php

namespace App\ValueObjects;

class Percentage
{
    public static function calculate(int $actual, int $total): string
    {
        if ($total > 0) {
            return number_format($actual / $total * 100, 2).'%';
        }
        return '0 %';
    }
}
