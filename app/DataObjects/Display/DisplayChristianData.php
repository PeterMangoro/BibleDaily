<?php

namespace App\DataObjects\Display;

use App\Models\Christian;

class DisplayChristianData
{
    public function __construct(
        public readonly  int $id,
        public readonly  string $name,
        public readonly  ?string $contact,
        public readonly  string $gender,
        public readonly  string $province,
        public readonly  ?string $pastor,
        public readonly  ?string $assembly,
        public readonly  ?string $status,
    ) {
    }

    public static function from(?Christian $christian): DisplayChristianData
    {
        return new self(
            $christian->id,
            strtolower($christian->name),
            $christian->contact,
            $christian->gender,
            $christian->province,
            strtolower($christian->pastor),
            strtolower($christian->assembly),
            $christian->status,
        );
    }
}
