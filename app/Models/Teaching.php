<?php

namespace App\Models;

use App\Builders\TeachingBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teaching extends SharedModel
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'page_visit_count',
        'title',
        'slug',
    ];

    public function newEloquentBuilder($query): TeachingBuilder
    {
        return new TeachingBuilder($query);
    }
}
