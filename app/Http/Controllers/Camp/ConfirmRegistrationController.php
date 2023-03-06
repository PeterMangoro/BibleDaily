<?php

namespace App\Http\Controllers\Camp;

use App\Models\Christian;
use App\Http\Controllers\Controller;
use App\View\Camp\Dashboard\ChristianProps;
use App\View\Camp\Dashboard\DashboardShowProps;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class ConfirmRegistrationController extends Controller
{
    public function show(): Response
    {
        return inertia('Camp/ConfirmDashboard', [
            'data' => new DashboardShowProps()
        ]);
    }
   

    public function all(): Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(new Christian(), 'all')
        ]);
    }


    public function sundaySchool(): Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(
                Christian::sundaySchool(),
                'sundaySchool'
            )
        ]);
    }

    public function youth(): Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(
                Christian::youth(),
                'youth'
            )
        ]);
    }

    public function overComers() :Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(
                Christian::overComers(),
                'overComers'
            )
        ]);
    }

    public function male() :Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(
                Christian::male(),
                'male'
            )
        ]);
    }

    public function female() :Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(
                Christian::female(),
                'female'
            )
        ]);
    }

    public function needAccommodation() :Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(
                Christian::needsAccommodation(),
                'needAccommodation'
            )
        ]);
    }
}
