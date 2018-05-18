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

	public function publish(Chapter $chapter)
	{
		Chapter::publish($chapter);
		$message = "Le chapitre a été publié avec succès !";
		return redirect()->back()->withMessage($message);
	}
}
