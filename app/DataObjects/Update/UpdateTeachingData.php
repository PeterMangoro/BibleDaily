<?php

namespace App\DataObjects\Update;

use App\Http\Requests\Teaching\UpdateTeachingRequest;

class UpdateTeachingData
{
    public function __construct(
        public readonly  ?string $title,
        public readonly  ?string $read,
        public readonly  ?string $notes,
        public readonly  ?string $prayer_points,
        public readonly  ?string $prayer,
    ) {
        // $this->title = $title;
        // $this->read = $read;
        // $this->notes = $notes;
        // $this->prayer_points = $prayer_points;
        // $this->prayer = $prayer;
    }

    public static function from(UpdateTeachingRequest $request): UpdateTeachingData
    {
        return new self(
            $request->title,
            $request->read,
            $request->notes,
            $request->prayer_points,
            $request->prayer,
        );
    }
}
