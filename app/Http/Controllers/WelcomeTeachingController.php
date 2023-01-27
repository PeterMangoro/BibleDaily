<?php

namespace App\Http\Controllers;

use App\View\Teaching\TeachingWelcomeIndexProps;
use App\View\Teaching\TeachingWelcomeShowProps;

class WelcomeTeachingController extends Controller
{
    public function index()
    {
        return inertia('Welcome/Teaching/Index', [
            'data' => new TeachingWelcomeIndexProps(),
        ]);
    }

    public function show(string $slug)
    {
        return inertia('Welcome/Teaching/Show', [
            'data' => new TeachingWelcomeShowProps($slug),
        ]);
    }
}
