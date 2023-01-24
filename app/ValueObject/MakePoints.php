<?php
namespace App\ValueObject;

class MakePoints
{
    public function __construct(
        public array $points,
    ) {
        $this->points = $points;
    }

    public static function from(string $string)
    {
        return (
            array_filter(
                explode('*', $string)
            )
        );
    }
}