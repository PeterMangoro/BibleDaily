<?php

namespace App\Services;

use App\Actions\BibleSession\CreateBibleSession;


class BibleSessionService
{
    public static function new_reading(): int
    {
        return CreateBibleSession::handle();
    }
  
}
