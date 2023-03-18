<?php

namespace App\Http\Controllers\Camp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function cleaning()
    {
        $images = [];

        for ($i=1; $i < 22; $i++) { 
            array_push($images,'/storage/cleaning/'.$i.'.jpg');
        }
        return inertia('Camp/Departments/Cleaning',[
           'data'=>[ 
            'images'=>$images,
            'heading'=>'Youth'
            ]
        ]);
    }

    public function youth()
    {
        $images = [];

        for ($i=1; $i < 22; $i++) { 
            array_push($images,'/storage/youth/'.$i.'.jpg');
        }
        for ($i=1; $i < 3; $i++) { 
            array_push($images,'/storage/youth/'.$i.'.jpeg');
        }
        return inertia('Camp/Departments/Gallery',[
           'data'=>[ 
            'images'=>$images,
            'heading'=>'Youth'
            ]
        ]);
    }

    public function speakers()
    {
        $images = [];

        for ($i=1; $i < 9; $i++) { 
            array_push($images,'/storage/speakers/'.$i.'.jpg');
        }
        return inertia('Camp/Departments/Gallery',[
           'data'=>[ 
            'images'=>$images,
            'heading'=>'Guest Speakers'
            ]
        ]);
    }

    public function worship()
    {
        $images = [];

        for ($i=0; $i < 18; $i++) { 
            array_push($images,'/storage/worship/'.$i.'.jpg');
        }
        return inertia('Camp/Departments/Gallery',[
           'data'=>[ 
            'images'=>$images,
            'heading'=>'Praise and Worship Team'
            ]
        ]);
    }

    public function transport()
    {
        

        return inertia('Camp/Departments/Transport');
    }
}
