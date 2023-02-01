<?php

namespace App\Models;

use App\Builders\TeachingBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teaching extends SharedModel
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'page_visit_count',
        'title',
        'slug',
    ];

    // public function classifications(): HasMany
    // {
    //     return $this->hasMany(Classification::class);
    // }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'classifications', );
    }
    public function newEloquentBuilder($query): TeachingBuilder
    {
        return new TeachingBuilder($query);
    }
}
