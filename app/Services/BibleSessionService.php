<?php

namespace App\Services;

use App\Actions\BibleSession\CreateBibleSession;

class BibleSessionService
{
    public static function newSession(): int
    {
        return CreateBibleSession::handle();
    }
}
