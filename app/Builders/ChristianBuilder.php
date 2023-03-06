<?php

namespace App\Builders;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ChristianBuilder extends Builder
{
    public function wherePresent()
    {
        return $this->where('status', 'present');
    }

    public function male()
    {
        return $this->where('gender', 'male');
    }

    public function female()
    {
        return $this->where('gender', 'female');
    }

    public function needsAccommodation()
    {
        return $this->where('need_accommodation', 'yes');
    }


    public function sundaySchool()
    {
        return
            $this->where('dob', '>=', $this->SundaySchoolAge());
    }

    public function youth()
    {
        return
            $this->where('dob', '<', $this->SundaySchoolAge())
            ->where('dob', '>', $this->overComerAge());
    }

    public function overComer()
    {
        return
            $this->where('dob', '<', $this->overComerAge());
    }

    public function search( ?string $terms = null)
    {
        collect(str_getcsv($terms, ' ', '"'))->filter()
            ->each(function ($term)  {
                $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $term) . '%';

                $this->whereIn('id', function ($query) use ($term) {
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
    
    private function SundaySchoolAge()
    {
        return Carbon::now()->subYears(12); #12 years

    }

    private function overComerAge()
    {
        return Carbon::now()->subYears(30); #30 years
    }
}
