<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'title',
        // 'slug',
    ];

    protected $hidden = [
        'pivot',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Teaching::class, 'classifications');
    }
}
