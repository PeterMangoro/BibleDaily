<?php

namespace App\Http\Controllers;

use Inertia\Response;

class WelcomeController extends Controller
{
    public function index():Response
    {
        // Reading::factory()->create();
        // return Reading::first();
        return inertia('Welcome');
    }
}
