<?php

namespace App\Http\Controllers\Camp;


use App\Models\Christian;
use App\View\Shared\Filters;
use App\ValueObjects\Percentage;
use App\Http\Controllers\Controller;


class ProvinceController extends Controller
{
    public function show()
    {
        $total = Christian::wherePresent()->count();

        $Bulawayo = Christian::wherePresent()->where('province', 'Bulawayo')->count();
        $bulawayo_total = Christian::where('province', 'Bulawayo')->count();
        $bulawayo_percentage = Percentage::calculate($Bulawayo, $total);

        $Harare = Christian::wherePresent()->where('province', 'Harare')->count();
        $harare_total = Christian::where('province', 'Harare')->count();
        $harare_percentage = Percentage::calculate($Harare, $total);

        $Manicaland = Christian::wherePresent()->where('province', 'Manicaland')->count();
        $manicaland_total = Christian::where('province', 'Manicaland')->count();
        $manicaland_percentage = Percentage::calculate($Manicaland, $total);

        $MashonalandCentral = Christian::wherePresent()->where('province', 'Mashonaland Central')->count();
        $mashonalandCentral_total = Christian::where('province', 'Mashonaland Central')->count();
        $mashonalandCentral_percentage = Percentage::calculate($MashonalandCentral, $total);

        $MashonalandEast = Christian::wherePresent()->where('province', 'Mashonaland East')->count();
        $mashonalandEast_total = Christian::where('province', 'Mashonaland East')->count();
        $mashonalandEast_percentage = Percentage::calculate($MashonalandEast, $total);

        $MashonalandWest = Christian::wherePresent()->where('province', 'Mashonaland West')->count();
        $mashonalandWest_total = Christian::where('province', 'Mashonaland West')->count();
        $mashonalandWest_percentage = Percentage::calculate($MashonalandWest, $total);

        $Masvingo = Christian::wherePresent()->where('province', 'Masvingo')->count();
        $masvingo_total = Christian::where('province', 'Masvingo')->count();
        $masvingo_percentage = Percentage::calculate($Masvingo, $total);

        $MatebelelandNorth = Christian::wherePresent()->where('province', 'Matebeleland North')->count();
        $matebelelandNorth_total = Christian::where('province', 'Matebeleland North')->count();;
        $matebelelandNorth_percentage = Percentage::calculate($MatebelelandNorth, $total);

        // dd($matebelelandNorth_total);
        $MatebelelandSouth = Christian::wherePresent()->where('province', 'Matebeleland South')->count();
        $matebelelandSouth_total = Christian::where('province', 'Matebeland South')->count();
        $matebelelandSouth_percentage = Percentage::calculate($MatebelelandSouth, $total);




        return inertia('Camp/Provinces', [
            'data' => [
                'bulawayo' => $Bulawayo,
                'bulawayo_total' => $bulawayo_total,
                'bulawayo_percentage' => $bulawayo_percentage,

                'harare' => $Harare,
                'harare_total' => $harare_total,
                'harare_percentage' => $harare_percentage,

                'manicaland' => $Manicaland,
                'manicaland_total' => $manicaland_total,
                'manicaland_percentage' => $manicaland_percentage,

                'mashonalandCentral' => $MashonalandCentral,
                'mashonalandCentral_total' => $mashonalandCentral_total,
                'mashonalandCentral_percentage' => $mashonalandCentral_percentage,

                'mashonalandEast' => $MashonalandEast,
                'mashonalandEast_total' => $mashonalandEast_total,
                'mashonalandEast_percentage' => $mashonalandEast_percentage,

                'mashonalandWest' => $MashonalandWest,
                'mashonalandWest_total' => $mashonalandWest_total,
                'mashonalandWest_percentage' => $mashonalandWest_percentage,

                'masvingo' => $Masvingo,
                'masvingo_total' => $masvingo_total,
                'masvingo_percentage' => $masvingo_percentage,

                'matebelelandNorth' => $MatebelelandNorth,
                'matebelelandNorth_total' => $matebelelandNorth_total,
                'matebelelandNorth_percentage' => $matebelelandNorth_percentage,

                'matebelelandSouth' => $MatebelelandSouth,
                'matebelelandSouth_total' => $matebelelandSouth_total,
                'matebelelandSouth_percentage' => $matebelelandSouth_percentage,

            ]

        ]);
    }

    public function bulawayo()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('province', 'Bulawayo')->search(request('search'))->latest('id')->paginate(15),
                'path' => 'bulawayo',
                Filters::filters()
            ]
        ]);
    }

    public function harare()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('province', 'Harare')->search(request('search'))->latest('id')->paginate(15),
                Filters::filters(),
                'path' => 'harare'
            ]
        ]);
    }

    public function manicaland()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('province', 'Manicaland')->search(request('search'))->latest('id')->paginate(15),
                Filters::filters(),
                'path' => 'manicaland',
            ]
        ]);
    }

    public function mashonalandCentral()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('province', 'Mashonaland Central')->search(request('search'))->latest('id')->paginate(15),
                Filters::filters(),
                'path' => 'mashonalandCentral',
            ]
        ]);
    }

    public function mashonalandEast()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('province', 'Mashonaland East')->search(request('search'))->latest('id')->paginate(15),
                Filters::filters(),
                'path' => 'mashonalandEast',
            ]
        ]);
    }

    public function mashonalandWest()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('province', 'Mashonaland West')->search(request('search'))->latest('id')->paginate(15),
                Filters::filters(),
                'path' => 'mashonalandWest',
            ]
        ]);
    }

    public function masvingo()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('province', 'Masvingo')->search(request('search'))->latest('id')->paginate(15),
                Filters::filters(),
                'path' => 'masvingo',
            ]
        ]);
    }

    public function matebelelandNorth()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('province', 'Matebeleland North')->search(request('search'))->latest('id')->paginate(15),
                Filters::filters(),
                'path' => 'matebelelandNorth',
            ]
        ]);
    }

    public function matebelelandSouth()
    {
        return inertia('Camp/Present', [
            'data' => [
                'users' => Christian::wherePresent()->where('province', 'Matebeleland South')->search(request('search'))->latest('id')->paginate(15),
                Filters::filters(),
                'path' => 'matebelelandSouth',
            ]
        ]);
    }
}
