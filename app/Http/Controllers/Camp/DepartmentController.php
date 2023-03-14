<?php

namespace App\Http\Controllers\Camp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function cleaning()
    {
        return inertia('Camp/Departments/Cleaning');
    }
}
