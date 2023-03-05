<?php

namespace App\Http\Controllers\Camp;

use Carbon\Carbon;
use App\Models\Christian;


use App\View\Shared\Filters;
use Illuminate\Http\Request;
use App\ValueObjects\Percentage;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function show()
    {
        $twelve_years = Carbon::now()->subYears(12);
        $thirty_years = Carbon::now()->subYears(30);

        // dd($twelve_years)

        $all=Christian::count();
        $attended=Christian::where('status','present')->count();
        $turnup =  number_format(($attended/$all)*100, 2).'%';
        $turnup = Percentage::calculate($attended,$all);
        $new_believers = Christian::where('status','present')->whereNull('pastor')->count();
        $believers = Christian::where('status','present')->whereNotNull('pastor')->count();
        $sunday_school = Christian::where('status','present')->where('dob', '>' ,$twelve_years )->count();
        $youth = Christian::where('status','present')->where('dob', '<' ,$twelve_years )->where('dob','>',$thirty_years)->count();
        $over_comers = Christian::where('status','present')->where('dob','<',$thirty_years )->count();
        $male = Christian::where('status','present')->where('gender','male')->count();
        $female = Christian::where('status','present')->where('gender','female')->count();
        $need_accommodation = Christian::where('need_accommodation','yes')->count();
        
        
        return inertia('Camp/Dashboard',[
           'data'=> [
            'all'=>$all,
            'attended'=>$attended,
            'turnup'=>$turnup,
            'new_believers'=>$new_believers,
            'believers'=>$believers,
            'sunday_school'=>$sunday_school,
            'youth'=>$youth,
            'over_comers'=>$over_comers,
            'male'=>$male,
            'female'=>$female,
            'need_accommodation'=>$need_accommodation,
            ]
            
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
        return inertia('Camp/Present',[
            'data'=>[
                'users'=> Christian::search(request('search'))->paginate(15),
                'path'=>'all',
                Filters::filters()
            ]
            ]);
    }

    public function present()
    {
        return inertia('Camp/Present',[
            'data'=>[
                'users'=> Christian::where('status','present')->search(request('search'))->paginate(15),
                'path'=>'present',
                Filters::filters()
               
            ]
            ]);
    }

    public function new()
    {
        return inertia('Camp/Present',[
            'data'=>[
                'users'=> Christian::where('status','present')->whereNull('pastor')->search(request('search'))->paginate(15),
                'path'=>'new',
                Filters::filters()
            ]
            ]);
    }

    public function members()
    {
        return inertia('Camp/Present',[
            'data'=>[
                'users'=> Christian::where('status','present')->whereNotNull('pastor')->search(request('search'))->paginate(15),
                'path'=>'members',
                Filters::filters()
            ]
            ]);
    }

    public function sundaySchool()
    {
        $twelve_years = Carbon::now()->subYears(12);
        return inertia('Camp/Present',[
            'data'=>[
                'users'=> Christian::where('status','present')->where('dob', '>' ,$twelve_years )->search(request('search'))->paginate(15),
                'path'=>'sundaySchool',
                Filters::filters()
            ]
            ]);
    }

    public function youth()
    {
        $twelve_years = Carbon::now()->subYears(12);
        $thirty_years = Carbon::now()->subYears(30);

        return inertia('Camp/Present',[
            'data'=>[
                'users'=> Christian::where('status','present')->where('dob', '<' ,$twelve_years )->where('dob','>',$thirty_years)->search(request('search'))->paginate(15),
                'path'=>'youth',
                Filters::filters()
            ]
            ]);
    }

    public function overComers()
    {
        $thirty_years = Carbon::now()->subYears(30);
        return inertia('Camp/Present',[
            'data'=>[
                'users'=> Christian::where('status','present')->where('dob','<',$thirty_years )->search(request('search'))->paginate(15),
                'path'=>'overComers',
                Filters::filters()
            ]
            ]);
    }

    public function male()
    {
        return inertia('Camp/Present',[
            'data'=>[
                'users'=> Christian::where('status','present')->where('gender','male')->search(request('search'))->paginate(15),
                'path'=>'male',
                Filters::filters()
            ]
            ]);
    }

    public function female()
    {
        return inertia('Camp/Present',[
            'data'=>[
                'users'=> Christian::where('status','present')->where('gender','female')->search(request('search'))->paginate(15),
                'path'=>'female',
                Filters::filters()
            ]
            ]);
    }

    public function needAccommodation()
    {
        return inertia('Camp/Present',[
            'data'=>[
                'users'=> Christian::where('need_accommodation','yes')->search(request('search'))->paginate(15),
                'path'=>'needAccommodation',
                Filters::filters()
            ]
            ]);
    }
}
