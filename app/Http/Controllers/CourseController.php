<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
    $cours = Cours::with('user')
        ->select('cours.*', DB::raw(
            '(SELECT COUNT(DISTINCT(user_id))
            FROM completions
            INNER JOIN episodes ON completions.episode_id = episodes.id
            WHERE episodes.cours_id = cours.id
            ) AS participants'
        ))
        ->withCount('episodes')
        ->latest()
        ->get();
            
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