<?php

namespace App\Services;

use App\Actions\Reading\CreateReading;
use App\Actions\Reading\UpdateReading;

class ReadingService
{
    public static function new_reading(object $bible_session, object $request): void
    {
        CreateReading::handle($bible_session, $request);
    }

    public static function update_reading(object $reading, object $request): void
    {
        UpdateReading::handle($reading, $request);
    }
}
