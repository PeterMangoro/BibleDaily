<?php

namespace App\DataObjects\Create;

use App\Http\Requests\Teaching\CreateTeachingRequest;

class CreateTeachingData
{
    /**
     * @param array<int> $categories
     */
    public function __construct(
        public readonly  array $categories,
        public readonly  string $title,
        public readonly  string $read,
        public readonly  string $notes,
        public readonly  string $prayer_points,
        public readonly  ?string $prayer,
    ) {
        // $this->title = $title;
        // $this->read = $read;
        // $this->notes = $notes;
        // $this->prayer_points = $prayer_points;
        // $this->prayer = $prayer;
    }

    public static function from(
        CreateTeachingRequest $request
    ): CreateTeachingData {
        return new self(
            $request->categories,
            $request->title,
            $request->read,
            $request->notes,
            $request->prayer_points,
            $request->prayer,
        );
    }
}
