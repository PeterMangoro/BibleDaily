<?php

namespace App\Http\Controllers;

use App\View\Teaching\TeachingWelcomeIndexProps;
use App\View\Teaching\TeachingWelcomeShowProps;
use Inertia\Response;

class WelcomeTeachingController extends Controller
{
    public function index():Response
    {
        return inertia('Welcome/Teaching/Index', [
            'data' => new TeachingWelcomeIndexProps(),
        ]);
    }

    public function show(string $slug):Response
    {
        return inertia('Welcome/Teaching/Show', [
            'data' => new TeachingWelcomeShowProps($slug),
        ]);
    }
}
