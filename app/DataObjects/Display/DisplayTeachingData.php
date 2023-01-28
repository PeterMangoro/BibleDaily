<?php

namespace App\DataObjects\Display;

class DisplayTeachingData
{
    /**
     * @param array<string> $notes
     * @param array<string> $prayer_points
     */
    public function __construct(
        public readonly  string $title,
        public readonly  string $read_date,
        public readonly  string $read_verses,
        public readonly  array $notes,
        public readonly  array $prayer_points,
    ) {
        // $this->title = $title;
        // $this->read_date = $read_date;
        // $this->read_verses = $read_verses;
        // $this->notes = $notes;
        // $this->prayer_points = $prayer_points;
    }

    public static function from(object $teaching, object $reading): object
    {
        // dd([$teaching->title]);
        return new self(
            $teaching->title,
            $reading->created_at,
            $reading->read,
            $reading->notes,
            $reading->prayer_points,
        );
    }
}
