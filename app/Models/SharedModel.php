<?php

namespace App\Models;

use App\Builders\SharedBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SharedModel extends Model
{
    use HasFactory;

    public function bible_session():BelongsTo
    {
        return $this->belongsTo(BibleSession::class);
    }

    public function newEloquentBuilder($query):SharedBuilder
    {
        return new SharedBuilder($query);
    }
}
