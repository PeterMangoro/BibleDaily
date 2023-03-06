<?php

namespace App\Http\Controllers\Camp;

use Carbon\Carbon;
use App\Models\Christian;


use App\View\Shared\Filters;
use Illuminate\Http\Request;
use App\ValueObjects\Percentage;
use App\Http\Controllers\Controller;
use App\View\Camp\Dashboard\DashboardShowProps;

class DashboardController extends Controller
{
    public function show()
    {
        return inertia('Camp/Dashboard', [
            'data' => new DashboardShowProps()
        ]);
    }

    public function attend(Christian $user)
    {
        $user->status = 'present';

        $user->save();

        return back()->with('flash.banner', 'Successfully Marked as Present');
    }

    public function all()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::search(request('search'))->latest('id')->paginate(15),
                'path' => 'all',
                Filters::filters()
            ]
        ]);
    }

    public function present()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->search(request('search'))->latest('id')->paginate(15),
                'path' => 'present',
                Filters::filters()

            ]
        ]);
    }

    public function new()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->whereNull('pastor')->search(request('search'))->latest('id')->paginate(15),
                'path' => 'new',
                Filters::filters()
            ]
        ]);
    }

    public function members()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->whereNotNull('pastor')->search(request('search'))->latest('id')->paginate(15),
                'path' => 'members',
                Filters::filters()
            ]
        ]);
    }

    public function sundaySchool()
    {
        $twelve_years = Carbon::now()->subYears(12);
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('dob', '>', $twelve_years)->search(request('search'))->latest('id')->paginate(15),
                'path' => 'sundaySchool',
                Filters::filters()
            ]
        ]);
    }

    public function youth()
    {
        $twelve_years = Carbon::now()->subYears(12);
        $thirty_years = Carbon::now()->subYears(30);

        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('dob', '<', $twelve_years)->where('dob', '>', $thirty_years)->search(request('search'))->latest('id')->paginate(15),
                'path' => 'youth',
                Filters::filters()
            ]
        ]);
    }

    public function overComers()
    {
        $thirty_years = Carbon::now()->subYears(30);
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('dob', '<', $thirty_years)->search(request('search'))->latest('id')->paginate(15),
                'path' => 'overComers',
                Filters::filters()
            ]
        ]);
    }

    public function male()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('gender', 'male')->search(request('search'))->latest('id')->paginate(15),
                'path' => 'male',
                Filters::filters()
            ]
        ]);
    }

    public function female()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('gender', 'female')->search(request('search'))->latest('id')->paginate(15),
                'path' => 'female',
                Filters::filters()
            ]
        ]);
    }

    public function needAccommodation()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::where('need_accommodation', 'yes')->search(request('search'))->latest('id')->paginate(15),
                'path' => 'needAccommodation',
                Filters::filters()
            ]
        ]);
    }
}
