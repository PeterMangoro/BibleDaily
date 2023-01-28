<?php

namespace App\Http\Controllers;

use App\Handlers\TeachingHandler;
use App\Http\Requests\Teaching\CreateTeachingRequest;
use App\Http\Requests\Teaching\UpdateTeachingRequest;
use App\Models\Teaching;
use App\View\Teaching\TeachingIndexProps;
use Inertia\Inertia;
use Inertia\Response;

class TeachingController extends Controller
{
    public function index():Response
    {
        return Inertia::render('User/Teaching/Index', [
            'data' => new TeachingIndexProps(),
        ]);
    }

    public function create():Response
    {
        return Inertia::render('User/Teaching/Create');
    }

    public function store(CreateTeachingRequest $request):void
    {
        TeachingHandler::store_teaching($request);
    }

    public function update(Teaching $teaching, UpdateTeachingRequest $request):void
    {
        TeachingHandler::update_teaching($teaching, $request);
    }
}
