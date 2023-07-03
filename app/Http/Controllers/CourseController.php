<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        // dd('hello');
        // inertia('Courses/Index');
        return Inertia::render('Courses/Index');
    }
}