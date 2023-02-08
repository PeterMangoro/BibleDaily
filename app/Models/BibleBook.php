<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BibleBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'alais',
        'title',
        'chapters',
        'testament',
        // 'bible_session_id',
    ];

    public $timestamps = false;
}
