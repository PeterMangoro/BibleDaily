<?php

namespace App\ValueObjects;

class MakePoints
{
    public function __construct(
        public array $points,
    ) {
        $this->points = $points;
    }

    public static function from(string $string):array
    {
        return (array_filter(
                explode('*', $string)
            )
        );
    }
}
