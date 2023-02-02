<?php

namespace App\Services;

use App\Actions\Category\AddCategory;

class CategoryService
{
    /**
     * @param array<int, int> $categories
     */
    public static function forModel(object $model, array $categories): void
    {
        AddCategory::handle($model, $categories);
    }
}
