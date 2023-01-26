<?php
namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class ReadingBuilder extends  Builder
{
    public function selectDetailAttributes()
    {
        return $this->select(
            'bible_session_id',
            'read',
            'notes',
            'prayer_points',
            'prayer',
            'created_at'
        );
    }
}