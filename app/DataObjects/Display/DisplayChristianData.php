<?php

namespace App\DataObjects\Display;

use App\Models\Christian;

class DisplayChristianData
{
    /**
     * @param array<string> $notes
     * @param array<string> $prayer_points
     */
    public function __construct(
        public readonly  string $name,
        public readonly  ?string $contact,
        public readonly  string $gender,
        public readonly  string $province,
        public readonly  ?string $pastor,
        public readonly  ?string $assembly,
    ) {
       
    }

    public static function from(?Christian $christian): DisplayChristianData
    {
        return new self(
            strtolower($christian->name),
            $christian->contact,
            $christian->gender,
            $christian->province,
            strtolower($christian->pastor),
            strtolower($christian->assembly),

        );
    }
}
