<?php

namespace App\Builders;

use Illuminate\Support\Facades\Auth;

trait SharedBuilder
{
    public function findBibleSession(int $int)
    {
        return $this->where('bible_session_id', $int)->first();
    }

    public function belongsToAuthUser()
    {
        return $this->whereRelation(
            'bibleSession',
            'user_id',
            '=',
            Auth::user()->id
        );
    }
}
