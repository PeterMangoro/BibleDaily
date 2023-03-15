<?php

namespace App\Http\Controllers\Camp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function cleaning()
    {
        return inertia('Camp/Departments/Cleaning');
    }

    public function youth()
    {
        $images = [];

        for ($i=1; $i < 19; $i++) { 
            array_push($images,'/storage/youth/'.$i.'.jpg');
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
}
