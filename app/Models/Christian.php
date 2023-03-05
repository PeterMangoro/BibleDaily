<?php

namespace App\Models;

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

    public function scopeSearch($query, ?string $terms = null)
    {
        collect(str_getcsv($terms, ' ', '"'))->filter()
            ->each(function ($term) use ($query) {
                $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $term) . '%';

                $query->whereIn('id', function ($query) use ($term) {
                    $query->select('id')
                        ->from(function ($query) use ($term) {
                            $query->select('id')
                                ->from('christians')
                                ->where('name_normalized', 'like', $term)
                                
                            ;
                        }, 'matches');
                });
            });
    }
}
