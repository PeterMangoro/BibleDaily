<?php

namespace App\Http\Controllers\Camp;

use App\Http\Controllers\Controller;
use App\Models\Christian;
use App\View\Camp\Dashboard\ChristianProps;
use App\View\Camp\Dashboard\DashboardShowProps;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class DashboardController extends Controller
{
    public function show(): Response
    {
        return inertia('Camp/Dashboard', [
            'data' => new DashboardShowProps(),
        ]);
    }

    public function attend(Christian $user): RedirectResponse
    {
        Christian::markAsPresent($user);
        return back()->with('flash.banner', 'Successfully Marked as Present');
    }

    public function all(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(new Christian(), 'all'),
        ]);
    }

    public function present(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(Christian::wherePresent(), 'present'),
        ]);
    }

    public function new(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(
                Christian::wherePresent()
                    ->whereNull('pastor'),
                'new'
            ),
        ]);
    }

    public function members(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(
                Christian::wherePresent()
                    ->whereNotNull('pastor'),
                'members'
            ),
        ]);
    }

    public function sundaySchool(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(
                Christian::wherePresent()
                    ->sundaySchool(),
                'sundaySchool'
            ),
        ]);
    }

    public function youth(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(
                Christian::wherePresent()
                    ->youth(),
                'youth'
            ),
        ]);
    }

    public function overComers(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(
                Christian::wherePresent()
                    ->overComers(),
                'overComers'
            ),
        ]);
    }

    public function male(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(
                Christian::wherePresent()
                    ->male(),
                'male'
            ),
        ]);
    }

    public function female(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(
                Christian::wherePresent()
                    ->female(),
                'female'
            ),
        ]);
    }

    public function needAccommodation(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(
                Christian::needsAccommodation(),
                'needAccommodation'
            ),
        ]);
    }
}
