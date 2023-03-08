<?php

namespace App\View\Camp\Dashboard;

use App\Models\Christian;
use App\ValueObjects\Percentage;
use App\View\Shared\BaseView;

class DashboardShowProps extends BaseView
{
    public function all(): int
    {
        return $this->allChristians();
    }

    public function attended(): int
    {
        return $this->attendedChristians();
    }

    public function turnup(): string
    {
        return Percentage::calculate(
            $this->attendedChristians(),
            $this->allChristians()
        );
    }

    public function newBelievers(): int
    {
        return Christian::wherePresent()->whereNull('pastor')->count();
    }

    public function believers(): int
    {
        return Christian::wherePresent()->whereNotNull('pastor')->count();
    }

    public function sundaySchool(): int
    {
        return Christian::wherePresent()->sundaySchool()->count();
    }

    public function youth(): int
    {
        return Christian::wherePresent()->youth()->count();
    }

    public function overComers(): int
    {
        return Christian::wherePresent()->overComer()->count();
    }

    public function male(): int
    {
        return Christian::wherePresent()->male()->count();
    }

    public function female(): int
    {
        return Christian::wherePresent()->female()->count();
    }

    public function needAccommodation(): int
    {
        return Christian::needsAccommodation()->count();
    }

    private function allChristians(): int
    {
        return Christian::count();
    }

    private function attendedChristians(): int
    {
        return Christian::wherePresent()->count();
    }
}
