<?php

namespace App\Http\Controllers;

use App\Handlers\ReadingHandler;
use App\Http\Requests\Reading\CreateReadingRequest;
use App\Http\Requests\Reading\UpdateReadingRequest;
use App\Models\Reading;
use App\View\Reading\ReadingCreateProps;
use App\View\Reading\ReadingEditProps;
use App\View\Reading\ReadingIndexProps;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class ReadingController extends Controller
{
    public function index(): Response
    {
        return inertia('User/Reading/Index', [
            'data' => new ReadingIndexProps(),
        ]);
    }

    public function create(): Response
    {
        return inertia('User/Reading/Create', [
            'data' => new ReadingCreateProps(),
        ]);
    }

    public function store(CreateReadingRequest $request): RedirectResponse
    {
        ReadingHandler::storeReading($request);

        return to_route('users.readings.index')
            ->with(
                'flash.banner',
                'Thank you for Reading the Bible,your Reading has been saved'
            );
    }

    public function edit(Reading $reading): Response
    {
        return inertia('User/Reading/Edit', [
            'data' => new ReadingEditProps($reading),
        ]);
    }

    public function update(
        Reading $reading,
        UpdateReadingRequest $request
    ): void {
        ReadingHandler::updateReading($reading, $request);
    }
}
