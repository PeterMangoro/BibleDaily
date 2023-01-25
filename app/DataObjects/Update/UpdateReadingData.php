<?php

namespace App\DataObjects\Update;

class UpdateReadingData
{
    public function __construct(
        public  ?string $read,
        public  ?string $notes,
        public  ?string $prayer_points,
        public  ?string $prayer,
    ) {
        $this->read = $read;
        $this->notes = $notes;
        $this->prayer_points = $prayer_points;
        $this->prayer = $prayer;
    }

    public static function from(object $request): object
    {
        return new static(
            $request->read,
            $request->notes,
            $request->prayer_points,
            $request->prayer,
        );
    }
}
