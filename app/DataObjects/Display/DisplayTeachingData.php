<?php
namespace App\DataObjects\Display;

use App\ValueObject\MakePoints;
use App\ValueObjects\Date;

class DisplayTeachingData
{
    public function __construct(
        public readonly string $title,
        public readonly string $read_date,
        public readonly string $read_verses,
        public readonly array $notes,
        public readonly array $prayer_points,
    )
    {
        $this->title=$title;
        $this->read_date=$read_date;
        $this->read_verses=$read_verses;
        $this->notes=$notes;
        $this->prayer_points=$prayer_points;
    }

    public static function from(object $teaching,object $reading):object
    {
        return new static(
            $teaching->read_verses,
            Date::readable($reading->created_at),
            $reading->read_verses,
            MakePoints::from($reading->notes),
            MakePoints::from($reading->prayer_points),
        );
    }

}