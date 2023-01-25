<?php
namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;


class BibleSessionBuilder extends Builder
{
    public function findBibleSession(int $int)
    {
        return $this->where('bible_session_id',$int)->first();
    }
}