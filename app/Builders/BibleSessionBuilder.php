<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class BibleSessionBuilder extends Builder
{
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
                ->whereRelation('teaching', 'title', 'like', $term)
                ->orWhere(function ($query) use ($term) {
                    $query
                        ->orwhereRelation(
                            'reading',
                            'notes',
                            'like',
                            $term
                        )
                        ->orWhereRelation(
                            'reading',
                            'verse',
                            'like',
                            $term
                        );
                });
        });
    }
}
