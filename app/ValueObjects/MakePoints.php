<?php

namespace App\ValueObjects;

class MakePoints
{
    public static function from(string $string): array
    {
        return (array_filter(
            explode('*', $string)
        )
        );
    }
}
