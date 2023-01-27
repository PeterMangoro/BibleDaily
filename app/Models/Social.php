<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Social extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'value',
        'username'
    ];

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function newEloquentBuilder($query)
    // {
    //     return new SocialBuilder($query);
    // }
}
