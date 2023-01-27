<?php

namespace App\DataObjects\Display;

class DisplayTeachingData
{
    public function __construct(
        public  string $title,
        public  string $read_date,
        public  string $read_verses,
        public  array $notes,
        public  array $prayer_points,
    ) {
        $this->title = $title;
        $this->read_date = $read_date;
        $this->read_verses = $read_verses;
        $this->notes = $notes;
        $this->prayer_points = $prayer_points;
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
