<?php

namespace App\Services;

use App\Actions\Category\AddCategory;

class CategoryService
{
    public static function for_model(object $model, array $categories)
    {
        return AddCategory::handle($model, $categories);
    }
}
