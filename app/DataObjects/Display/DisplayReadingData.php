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
        public readonly  string $uuid,
        public readonly  string $read_date,
        public readonly  string $read_verses,
        public readonly  array $notes,
        public readonly  array $prayer_points,
    ) {
    }

    public static function from(?Reading $reading): DisplayReadingData
    {
        return new self(
            $reading->uuid,
            $reading->created_at,
            $reading->verse,
            $reading->notes,
            $reading->prayer_points,
        );
    }
}
