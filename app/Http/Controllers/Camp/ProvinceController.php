<?php

namespace App\Http\Controllers\Camp;

use App\Http\Controllers\Controller;
use App\Models\Christian;
use App\ValueObjects\Percentage;
use App\View\Camp\Dashboard\ChristianProps;
use Inertia\Response;

class ProvinceController extends Controller
{
    public function show(): Response
    {
        $total = Christian::wherePresent()->count();

        $Bulawayo = Christian::wherePresent()->comingFrom('Bulawayo')->count();
        $bulawayo_total = Christian::comingFrom('Bulawayo')->count();
        $bulawayo_percentage = Percentage::calculate($Bulawayo, $total);

        $Harare = Christian::wherePresent()->comingFrom('Harare')->count();
        $harare_total = Christian::comingFrom('Harare')->count();
        $harare_percentage = Percentage::calculate($Harare, $total);

        $Manicaland = Christian::wherePresent()->comingFrom('Manicaland')->count();
        $manicaland_total = Christian::comingFrom('Manicaland')->count();
        $manicaland_percentage = Percentage::calculate($Manicaland, $total);

        $MashonalandCentral = Christian::wherePresent()->comingFrom('Mashonaland Central')->count();
        $mashonalandCentral_total = Christian::comingFrom('Mashonaland Central')->count();
        $mashonalandCentral_percentage = Percentage::calculate($MashonalandCentral, $total);

        $MashonalandEast = Christian::wherePresent()->comingFrom('Mashonaland East')->count();
        $mashonalandEast_total = Christian::comingFrom('Mashonaland East')->count();
        $mashonalandEast_percentage = Percentage::calculate($MashonalandEast, $total);

        $MashonalandWest = Christian::wherePresent()->comingFrom('Mashonaland West')->count();
        $mashonalandWest_total = Christian::comingFrom('Mashonaland West')->count();
        $mashonalandWest_percentage = Percentage::calculate($MashonalandWest, $total);

        $Masvingo = Christian::wherePresent()->comingFrom('Masvingo')->count();
        $masvingo_total = Christian::comingFrom('Masvingo')->count();
        $masvingo_percentage = Percentage::calculate($Masvingo, $total);

        $MatebelelandNorth = Christian::wherePresent()->comingFrom('Matebeleland North')->count();
        $matebelelandNorth_total = Christian::comingFrom('Matebeleland North')->count();

        $matebelelandNorth_percentage = Percentage::calculate($MatebelelandNorth, $total);

        // dd($matebelelandNorth_total);
        $MatebelelandSouth = Christian::wherePresent()->comingFrom('Matebeleland South')->count();
        $matebelelandSouth_total = Christian::comingFrom('Matebeland South')->count();
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

            ],

        ]);
    }

    public function bulawayo(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(Christian::comingFrom('Bulawayo'), 'bulawayo'),
        ]);
    }

    public function harare(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(Christian::comingFrom('Harare'), 'harare'),
        ]);
    }

    public function manicaland(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(Christian::comingFrom('Manicaland'), 'manicaland'),
        ]);
    }

    public function mashonalandCentral(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(Christian::comingFrom('Mashonaland Central'), 'mashonalandCentral'),
        ]);
    }

    public function mashonalandEast(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(Christian::comingFrom('Mashonaland East'), 'mashonalandEast'),
        ]);
    }

    public function mashonalandWest(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(Christian::comingFrom('Mashonaland West'), 'mashonalandWest'),
        ]);
    }

    public function masvingo(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(Christian::comingFrom('Masvingo'), 'masvingo'),
        ]);
    }

    public function matebelelandNorth(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(Christian::comingFrom('Matebeleland North'), 'matebelelandNorth'),
        ]);
    }

    public function matebelelandSouth(): Response
    {
        return inertia('Camp/Present', [
            'data' => new ChristianProps(Christian::comingFrom('Matebeleland South'), 'matebelelandSouth'),
        ]);
    }
}
