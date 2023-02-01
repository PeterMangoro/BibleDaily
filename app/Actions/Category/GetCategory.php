<?php

namespace App\Actions\Category;

use App\Models\Category;

class GetCategory
{
    public static function handle(Category $data)
    {
        return $data->toBase()
            ->get()
            ->sortBy('title')
            ->pluck('title')
            ->unique()
            ->map(
                fn ($title) => [
                    'title' => ucwords(preg_replace('/[_]/', ' ', $title)),
                    'slug' => $title,
                ]
            );
    }
}
