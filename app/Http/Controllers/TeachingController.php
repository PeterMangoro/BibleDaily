<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Teaching;
use App\Handlers\TeachingHandler;
use App\View\Teaching\TeachingIndexProps;
use App\Http\Requests\Teaching\CreateTeachingRequest;
use App\Http\Requests\Teaching\UpdateTeachingRequest;

class TeachingController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Teaching/Index',[
            'data'=> new TeachingIndexProps()
        ]);
    }

    public function create()
    {
        return Inertia::render('User/Teaching/Create');
    }

    public function store(CreateTeachingRequest $request)
    {
        TeachingHandler::store_teaching($request);
    }

    public function update(Teaching $teaching,UpdateTeachingRequest $request)
    {
        TeachingHandler::update_teaching($teaching,$request);
    }
}
