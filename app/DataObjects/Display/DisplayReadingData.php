<?php

namespace App\DataObjects\Display;

use App\ValueObjects\Date;

final class DisplayReadingData
{
    public function __construct(
        public  string $read_date,
        public  string $read_verses,
        public  array $notes,
        public  array $prayer_points,
    ) {
        $this->read_date = $read_date;
        $this->read_verses = $read_verses;
        $this->notes = $notes;
        $this->prayer_points = $prayer_points;
    }

    public static function from(object $reading): object
    {
        return new static(
            $reading->created_at,
            $reading->read,
            $reading->notes,
            $reading->prayer_points,
        );
    }
}
