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


    public function search(?string $terms = null)
    {
        $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';
        return $this->when($terms, function ($query) use ($term) {
            $query
                ->where('title_normalized', 'like', $term);
                
        });
    }
    
}
