<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends SharedModel
{
    use HasFactory;

    protected $fillable = [
        'read',
        'notes',
        'prayer_points',
        'prayer'
    ];
}
