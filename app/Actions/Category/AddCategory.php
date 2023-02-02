<?php

namespace App\Actions\Category;

class AddCategory
{
    /**
     * @param array<int , int> $categories
     */
    public static function handle(object $model, array $categories): void
    {
        $model->categories()->sync($categories);
    }
}
