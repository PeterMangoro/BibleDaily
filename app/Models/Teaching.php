<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teaching extends SharedModel
{
    use HasFactory;

    protected $fillable = [
        'page_visit_count',
        'title'
    ];
}
