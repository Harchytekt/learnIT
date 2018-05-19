<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Chapter;
use App\Course;
use App\Part;
use Auth;

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
		if ($course->creator_id == Auth::user()->id || $chapter->isPublished()) {
			return view('authenticated.chapitre', compact('course', 'chapter'));
		}
		$message = "Vous n'êtes pas autorisé à voir ce chapitre !";
		return redirect()->back()->withMessage($message);
    }

	public function publish(Chapter $chapter)
	{
		Chapter::publish($chapter);
		$message = "Le chapitre a été publié avec succès !";
		return redirect()->back()->withMessage($message);
	}

	public function initChapter(Course $course) {
		$type = 'chapitre';
		return view('authenticated.init', compact('type', 'course'));
	}

    public function chapterInitialization(Course $course, Request $request) {
		Validator::make($request->all(), [
			'name' => 'required|unique:courses|string|min:2|max:255|regex:/([A-Za-zÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ0-9 \'\(\)-])/',
		])->validate();

        $chapter = new Chapter;
		$chapter->name = request('name');
		$chapter->course_id = $course->id;
		$chapter->order_id = Chapter::where('course_id', $course->id)->max('order_id') + 1;
        $chapter->save();

		$part = new Part;
		$part->chapter_id = $chapter->id;
		$part->save();

        $message = "Le chapitre a été créé avec succès !";
        return redirect('/cours/'.$course->id)->withMessage($message);
    }
}
