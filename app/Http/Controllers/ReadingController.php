<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use App\Handlers\ReadingHandler;
use App\View\Reading\ReadingIndexProps;
use App\View\Reading\ReadingCreateProps;
use App\Http\Requests\Reading\CreateReadingRequest;
use App\Http\Requests\Reading\UpdateReadingRequest;
use Djunehor\Logos\Bible;

class ReadingController extends Controller
{
    public function index()
    {
        return inertia('User/Reading/Index', [
            'data' => new ReadingIndexProps(),
        ]);
    }

    public function create()
    {      
        return inertia('User/Reading/Create',[
            'data'=> new ReadingCreateProps(),
        ]);
    }

    public function store(CreateReadingRequest $request)
    {
        ReadingHandler::store_reading($request);
        return to_route('users.readings.index')->with('flash.banner', 'Thank you for Reading the Bible,your Reading has been saved');
    }

    public function update(Reading $reading, UpdateReadingRequest $request)
    {
        ReadingHandler::update_reading($reading, $request);
    }
}
