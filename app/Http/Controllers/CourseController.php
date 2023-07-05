<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        // dd('hello');
        // inertia('Courses/Index');
        $cours = Cours::all();
        // dd($cours);
        return Inertia::render('Courses/Index', [
            'cours' => $cours
        ]);
    }
}