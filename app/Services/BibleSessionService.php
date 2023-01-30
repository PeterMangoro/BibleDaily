<?php

namespace App\Services;

use App\Actions\BibleSession\CreateBibleSession;

class BibleSessionService
{
    public static function new_session(): int
    {
        return CreateBibleSession::handle();
    }
}
