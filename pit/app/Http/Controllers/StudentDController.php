<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class StudentDController extends Controller
{
    /**
     * Display the student dashboard.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Dashboard/StudentD', [
            'auth' => auth()->user(),
        ]);
    }
}
