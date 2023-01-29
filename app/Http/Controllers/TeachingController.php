<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Teaching;
use App\Handlers\TeachingHandler;
use App\View\Teaching\TeachingIndexProps;
use App\View\Teaching\TeachingCreateProps;
use App\Http\Requests\Teaching\CreateTeachingRequest;
use App\Http\Requests\Teaching\UpdateTeachingRequest;
use Illuminate\Http\RedirectResponse;

class TeachingController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('User/Teaching/Index', [
            'data' => new TeachingIndexProps(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('User/Teaching/Create',[
            'data' => new TeachingCreateProps(),
        ]);
    }

    public function store(CreateTeachingRequest $request): RedirectResponse
    {
        TeachingHandler::store_teaching($request);
        return to_route('users.teachings.index');
    }

    public function update(Teaching $teaching, UpdateTeachingRequest $request): void
    {
        TeachingHandler::update_teaching($teaching, $request);
    }
}
