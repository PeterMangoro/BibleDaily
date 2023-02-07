<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class ReadingBuilder extends Builder
{
    public function selectDetailAttributes()
    {
        return $this->select(
            'uuid',
            'bible_session_id',
            'verse',
            'notes',
            'prayer_points',
            'prayer',
            'created_at'
        );
    }

    public function search(?string $terms = null)
    {
        $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';
        return $this->when($terms, function ($query) use ($term) {
            $query
                ->where('verse', 'like', $term)
                ->orWhere('notes', 'like', $term);
        });
    }
}
