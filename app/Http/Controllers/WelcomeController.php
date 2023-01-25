<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Reading;

class WelcomeController extends Controller
{
    public function index()
    {
        return Reading::find(1);
        return Inertia::render('Welcome');
    }
}
