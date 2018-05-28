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

	/**
	 * Initialize a new chapter.
	 *
	 * @var $course
	 *		The course to Initialise.
	 * @var $request
	 *		The request contains the data of the course.
	 */
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
		$part->type = 'theory';
		$part->save();

        $message = "Le chapitre a été créé avec succès !";
        return redirect('/cours/'.$course->id)->withMessage($message);
    }

	/**
	 * Show the initialisation view of a new chapter.
	 *
	 * @var $course
	 *		The course to Initialise.
	 */
	public function initChapter(Course $course) {
		$type = 'chapitre';
		return view('authenticated.init', compact('type', 'course'));
	}

	/**
	 * Publish the given chapter.
	 *
	 * @var $chapter
	 *		The chapter to publish.
	 */
	public function publish(Chapter $chapter)
	{
		Chapter::publish($chapter);
		$message = "Le chapitre a été publié avec succès !";
		return redirect()->back()->withMessage($message);
	}

	/**
	 * Show the given chapter if possible.
	 *
	 * @var $course
	 *		The course containing the chapter to show.
	 * @var $chapter
	 *		The chapter to show.
	 * @var $part_order_id
	 *		The ID of the part of the chapter to show.
	 */
    public function show(Course $course, Chapter $chapter, int $part_order_id)
    {
		if ($course->creator_id == Auth::user()->id || $chapter->isPublished()) {
			$part = Part::getPart($chapter->id, $part_order_id);
			if ($part !== null) {
				return view('authenticated.chapitre', compact('course', 'chapter', 'part'));
			}
			$message = "Cette partie n'existe pas !";
			return redirect()->back()->withMessage($message);
		}
		$message = "Vous n'êtes pas autorisé à voir ce chapitre !";
		return redirect()->back()->withMessage($message);
    }

	/**
	 * Show the view of the first part of the given chapter.
	 * It's used when no part or a bad part is given to the show function.
	 *
	 * @var $course
	 *		The course containing the chapter to show.
	 * @var $chapter
	 *		The chapter to show.
	 */
	public function showFirstPart(Course $course, Chapter $chapter)
    {
		return $this::show($course, $chapter, 1);
    }
}
