<?php

namespace App\Models;

use App\Builders\ReadingBuilder;
use App\Casts\DateReadCast;
use App\Casts\MakePointsCast;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reading extends SharedModel
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'verse',
        'notes',
        'prayer_points',
        'prayer',
        'bible_session_id',
    ];

    protected $casts = [
        'prayer_points' => MakePointsCast::class,
        'notes' => MakePointsCast::class,
        'created_at' => DateReadCast::class,
        // 'points' => MakePointsCast::class, #when they are related
    ];

    public function newEloquentBuilder($query): ReadingBuilder
    {
        return new ReadingBuilder($query);
    }

    // public function belongsTologedUser()
    // {
    //     return $this->belongsToAuthUser();
    // }
}
