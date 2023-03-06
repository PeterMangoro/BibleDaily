<?php

namespace App\Models;

use App\Builders\ChristianBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Christian extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'password',
        'username',
        'dob',
        'country',
        'province',
        'assembly',
        'pastor',
        'invite',
        'need_accommodation',
        'contact'
    ];

   

    public function newEloquentBuilder($query): ChristianBuilder
    {
        return new ChristianBuilder($query);
    }
}
