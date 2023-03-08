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
        public readonly  string $author,
        public readonly  string $title,
        public readonly  string $slug,
        public readonly  string $uuid,
        public readonly  object $categories,
        public readonly  string $written_date,
        public readonly  string $verses,
        public readonly  array $notes,
        public readonly  array $prayer_points,
        public readonly  ?string $prayer,
    ) {
    }

    public static function from(
        Teaching $teaching,
        Reading $reading,
        string $name
    ): DisplayTeachingData {
        return new self(
            $name,
            $teaching->title,
            $teaching->slug,
            $teaching->uuid,
            $teaching->categories,
            $reading->created_at,
            $reading->verse,
            $reading->notes,
            $reading->prayer_points,
            $reading->prayer ?: 'No Prayer Available',
        );
    }
}
