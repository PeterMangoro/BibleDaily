<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Reading;

class WelcomeController extends Controller
{
    public function index()
    {
        Reading::factory()->create();
        return Reading::first();
        return Inertia::render('Welcome');
    }
}
