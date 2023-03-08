<?php

namespace App\Http\Controllers\Camp;

use App\Http\Controllers\Controller;
use App\Models\Christian;
use App\View\Camp\Dashboard\ChristianProps;
use App\View\Camp\Dashboard\DashboardShowProps;
use Inertia\Response;

class ConfirmRegistrationController extends Controller
{
    public function show(): Response
    {
        return inertia('Camp/ConfirmDashboard', [
            'data' => new DashboardShowProps(),
        ]);
    }

    public function all(): Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(new Christian(), 'confirm-all'),
        ]);
    }

    public function sundaySchool(): Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(
                Christian::sundaySchool(),
                'confirm-sundaySchool'
            ),
        ]);
    }

    public function youth(): Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(
                Christian::youth(),
                'confirm-youth'
            ),
        ]);
    }

    public function overComers(): Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(
                Christian::overComer(),
                'confirm-overComers'
            ),
        ]);
    }

    public function male(): Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(
                Christian::male(),
                'confirm-male'
            ),
        ]);
    }

    public function female(): Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(
                Christian::female(),
                'confirm-female'
            ),
        ]);
    }

    public function needAccommodation(): Response
    {
        return inertia('Camp/Confirm', [
            'data' => new ChristianProps(
                Christian::needsAccommodation(),
                'confirm-needAccommodation'
            ),
        ]);
    }
}
