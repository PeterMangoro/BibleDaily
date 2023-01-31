<?php

namespace App\DataObjects\Display;

use App\Models\Reading;
use App\Models\Teaching;

class DisplayTeachingData
{
    /**
     * @param array<string> $notes
     * @param array<string> $prayer_points
     */
    public function __construct(
        public readonly  string $title,
        public readonly  string $slug,
        public readonly  string $read_date,
        public readonly  string $read_verses,
        public readonly  array $notes,
        public readonly  array $prayer_points,
        public readonly  ?string $prayer,
    ) {
        // $this->title = $title;
        // $this->read_date = $read_date;
        // $this->read_verses = $read_verses;
        // $this->notes = $notes;
        // $this->prayer_points = $prayer_points;
    }

    public static function from(Teaching $teaching, Reading $reading): DisplayTeachingData
    {
        return new self(
            $teaching->title,
            $teaching->slug,
            $reading->created_at,
            $reading->verse,
            $reading->notes,
            $reading->prayer_points,
            $reading->prayer ?? 'No Prayer Available',
        );
    }
}
