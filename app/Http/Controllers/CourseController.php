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
        $ids = intval($id);
        // dd($ids);
        $course = Cours::where('id', $id)->with('episodes')->first();
        // dd($course);
        return Inertia::render('Courses/Show', [
            'course' => $course
        ]);
    }

    public function toggleProgress(Request $request)
    {
        // dd($request);
        $id = $request->input('episodeId');
        $user = auth()->user();

        $user->episodes()->toggle($id);

        return $user->episodes;
    } 
}