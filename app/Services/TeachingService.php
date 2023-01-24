<?php

namespace App\Services;

use App\Actions\Teaching\CreateTeaching;
use App\Actions\Teaching\UpdateTeaching;

class TeachingService
{
    public static function new_teaching(object $bible_session, object $request): void
    {
        CreateTeaching::handle($bible_session, $request);
    }

    public static function update_teaching(object $teaching, object $request): void
    {
        UpdateTeaching::handle($teaching, $request);
    }
}
