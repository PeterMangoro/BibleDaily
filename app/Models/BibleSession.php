<?php

namespace App\Models;

use App\Builders\BibleSessionBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BibleSession extends Model
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'user_id',
        'uuid',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reading(): HasOne
    {
        return $this->hasOne(Reading::class);
    }

    public function teaching(): HasOne
    {
        return $this->hasOne(Teaching::class);
    }

    public function newEloquentBuilder($query): BibleSessionBuilder
    {
        return new BibleSessionBuilder($query);
    }
}
