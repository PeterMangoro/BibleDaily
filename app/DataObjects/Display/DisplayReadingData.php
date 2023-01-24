<?php
namespace App\DataObjects\Display;

use App\ValueObject\MakePoints;
use App\ValueObjects\Date;

class DisplayReadingData
{
    public function __construct(
        public readonly string $read_date,
        public readonly string $read_verses,
        public readonly array $notes,
        public readonly array $prayer_points,
    )
    {
        $this->read_date=$read_date;
        $this->read_verses=$read_verses;
        $this->notes=$notes;
        $this->prayer_points=$prayer_points;
    }

    public static function from(object $reading):object
    {
        return new static(
            Date::readable($reading->created_at),
            $reading->read_verses,
            MakePoints::from($reading->notes),
            MakePoints::from($reading->prayer_points),
        );
    }

}