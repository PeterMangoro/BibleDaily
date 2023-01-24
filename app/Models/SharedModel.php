<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedModel extends Model
{
    use HasFactory;

    public function bible_session()
    {
        return $this->belongsTo(BibleSession::class);
    }
}
