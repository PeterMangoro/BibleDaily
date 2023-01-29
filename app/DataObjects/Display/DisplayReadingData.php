<?php

namespace App\DataObjects\Display;

use App\Models\Reading;

class DisplayReadingData
{
    /**
     * @param array<string> $notes
     * @param array<string> $prayer_points
     */
    public function __construct(
        public readonly  string $read_date,
        public readonly  string $read_verses,
        public readonly  array $notes,
        public readonly  array $prayer_points,
    ) {
        // $this->read_date = $read_date;
        // $this->read_verses = $read_verses;
        // $this->notes = $notes;
        // $this->prayer_points = $prayer_points;
    }

    public static function from(Reading $reading): DisplayReadingData
    {
        return new self(
            $reading->created_at,
            $reading->read,
            $reading->notes,
            $reading->prayer_points,
        );
    }
}
