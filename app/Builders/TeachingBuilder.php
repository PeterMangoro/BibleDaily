<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class TeachingBuilder extends Builder
{
    public function selectDetailAttributes()
    {
        return $this->select(
            'bible_session_id',
            'title',
            'slug'
        );
    }
}
