<?php

namespace App\DataObjects\Update;

class UpdateReadingData
{
    public function __construct(
        public readonly  ?string $read,
        public readonly  ?string $notes,
        public readonly  ?string $prayer_points,
        public readonly  ?string $prayer,
    ) {
        // $this->read = $read;
        // $this->notes = $notes;
        // $this->prayer_points = $prayer_points;
        // $this->prayer = $prayer;
    }

    public static function from(object $request): object
    {
        return new self(
            $request->read,
            $request->notes,
            $request->prayer_points,
            $request->prayer,
        );
    }
}
