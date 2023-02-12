<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Response;
use App\View\Teaching\TeachingWelcomeShowProps;
use App\View\Teaching\TeachingWelcomeIndexProps;

class WelcomeTeachingController extends Controller
{
    public function index(): Response
    {
        return inertia('Welcome/Teaching/Index', [
            'data' => new TeachingWelcomeIndexProps(),
        ]);
    }

    public function show(string $slug): Response
    {
        return inertia('Welcome/Teaching/Show', [
            'data' => new TeachingWelcomeShowProps($slug),
        ]);
    }

    public function users(): Response
    {
        $user = User::with('bibleSessions.reading','bibleSessions.teaching')->get();
       
        return inertia('Welcome/Teaching/Users', [
            'data' => $user,
        ]);
    }
}
