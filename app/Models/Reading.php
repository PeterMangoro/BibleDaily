<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends SharedModel
{
    use HasFactory;

    protected $fillable = [
        'read_from',
        'read_to',
    ];
}
