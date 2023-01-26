<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Reading;
use App\Handlers\ReadingHandler;
use App\View\Reading\ReadingIndexProps;
use App\Http\Requests\Reading\CreateReadingRequest;
use App\Http\Requests\Reading\UpdateReadingRequest;

class ReadingController extends Controller
{
    public function index()
    {
        return inertia('User/Reading/Index',[
            'data'=> new ReadingIndexProps()
        ]);
    }

    public function create()
    {
        return inertia('User/Reading/Create');
    }

    public function store(CreateReadingRequest $request)
    {
        ReadingHandler::store_reading($request);
    }

    public function update(Reading $reading,UpdateReadingRequest $request)
    {
        ReadingHandler::update_reading($reading,$request);
    }
}
