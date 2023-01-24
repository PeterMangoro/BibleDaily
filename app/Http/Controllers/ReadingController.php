<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadingController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Reading/Index',[
            'data'=>ReadingIndexProps()
        ]);
    }
}
