<?php

namespace App\Actions\Category;

class AddCategory
{
    public static function handle(object $model, array $categories)
    {
        $model->categories()->sync($categories);
    }
}
