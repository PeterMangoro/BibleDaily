<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class BibleSessionBuilder extends Builder
{
    public function findBibleSession(int $int)
    {
        return $this->where('bible_session_id', $int)->first();
    }

    public function belongsToAuthUser()
    {
        return $this->where('user_id', Auth::user()->id);
    }

    public function selectDetailAttributes()
    {
        return $this->select(
            'user_id',
            'id',
        );
    }
}
