<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Teaching;
use App\Handlers\TeachingHandler;
use Illuminate\Http\RedirectResponse;
use App\View\Teaching\TeachingEditProps;
use App\View\Teaching\TeachingIndexProps;
use App\View\Teaching\TeachingCreateProps;
use App\Http\Requests\Teaching\CreateTeachingRequest;
use App\Http\Requests\Teaching\UpdateTeachingRequest;

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
        return Inertia::render('User/Teaching/Create', [
            'data' => new TeachingCreateProps(),
        ]);
    }

    public function edit(string $slug): Response
    {
        return Inertia::render('User/Teaching/Edit', [
            'data' => new TeachingEditProps($slug),
        ]);
    }

    public function store(CreateTeachingRequest $request): RedirectResponse
    {
        TeachingHandler::store_teaching($request);
        return to_route('users.teachings.index');
    }

    public function update(Teaching $teaching, UpdateTeachingRequest $request): RedirectResponse
    {
        TeachingHandler::update_teaching($teaching, $request);
        return to_route('users.teachings.index');
    }
}
