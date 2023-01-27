<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function index()
    {
        // Reading::factory()->create();
        // return Reading::first();
        return inertia('Welcome');
    }
}
