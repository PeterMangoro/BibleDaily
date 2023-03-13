<?php

namespace App\View\Camp\Dashboard;

use App\Models\Christian;
use App\ValueObjects\Percentage;
use App\View\Shared\BaseView;

class ConfirmDashboardShowProps extends BaseView
{
    public function all(): int
    {
        return $this->allChristians();
    }

    public function sundaySchool(): int
    {
        return Christian::sundaySchool()->count();
    }

    public function youth(): int
    {
        return Christian::youth()->count();
    }

    public function overComers(): int
    {
        return Christian::overComer()->count();
    }

    public function male(): int
    {
        return Christian::male()->count();
    }

    public function female(): int
    {
        return Christian::female()->count();
    }

    public function needAccommodation(): int
    {
        return Christian::needsAccommodation()->count();
    }

    private function allChristians(): int
    {
        return Christian::count();
    }

}
