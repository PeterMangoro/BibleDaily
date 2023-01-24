<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrayerPoint extends SharedModel
{
    use HasFactory;

    protected $fillable = [
        'point'
    ];
}
