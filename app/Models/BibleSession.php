<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BibleSession extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function verses():HasMany
    {
       return $this->hasMany(Verse::class);
    }

    public function notes():HasMany
    {
       return $this->hasMany(Note::class);
    }

    public function prayers():HasMany
    {
       return $this->hasMany(Prayer::class);
    }

    public function prayer_points():HasMany
    {
       return $this->hasMany(PrayerPoint::class);
    }

    public function teachings():HasMany
    {
       return $this->hasMany(Teaching::class);
    }

}
