<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Course;

class ChapterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Course $course, Chapter $chapter)
    {
        return view('authenticated.chapitre', compact('course', 'chapter'));
    }
}
