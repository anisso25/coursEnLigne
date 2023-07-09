<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Cours;
use App\Models\Episode;


use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $cours = Cours::with('user')->withCount('episodes')->get();
        //dd($cours);
        return Inertia::render('Courses/Index', [
            'cours' => $cours
        ]);
    }

    public function show($id)
    {
        $course = Cours::where('id', $id)->with('episodes')->first();
        
        $watched = auth()->user()->episodes;

        return Inertia::render('Courses/Show', [
            'course' => $course,
            'watched' => $watched
        ]);
    }

    public function toggleProgress(Request $request)
    {
        // dd($request);
        $id = $request->input('episodeId');
        
        $user = auth()->user();

        $user->episodes()->toggle($id);
        // dd($user);
        return $user->episodes;
    } 
}