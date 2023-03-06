<?php

namespace App\Builders;

use App\Models\Christian;
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

    public function markAsPresent(Christian $user)
    {
        $user->status = 'present';
        $user->save();
    }

    public function search(?string $terms = null)
    {

        $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';

        return   
        $this->when($terms, function ($query) use ($term) {
            $query
                ->where('name_normalized', 'like', $term);
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
