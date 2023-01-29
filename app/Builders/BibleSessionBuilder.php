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

    public function search(?string $terms = null)
    {
        $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';
        return $this->when($terms, function ($query) use ($term) {
            $query
                ->whereRelation('teaching', 'title_normalized', 'like', $term)
                ->orWhere(function ($query) use ($term) {
                    $query->orwhereRelation('reading', 'notes_normalized', 'like', $term)
                        ->orWhereRelation('reading', 'verse_normalized', 'like', $term);
                })

            ;
        });
    }
}
