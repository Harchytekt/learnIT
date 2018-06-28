<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Chapter;
use App\Course;
use App\Part;
use Auth;

class PartController extends Controller
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
	 * Show the 'import a quiz' help page.
	 */
	public function help()
	{
		return view('authenticated.edit.help');
	}

	/**
	 * Show the view of the initialization of a new part.
	 *
	 * @var $chapter
	 *		The chapter in which the part will be added.
	 * @var $type
	 *		The type of the new part:
	 *			- 1, a theoric part;
	 *			- 2, a quiz part;
	 *			- 3, a test (rated) part.
	 */
    public function partInitialization(Chapter $chapter, string $type) {
		switch ($type) {
			case '1':
				$type = 'theory';
				break;
			case '2':
				$type = 'quiz';
				break;
			case '3':
				$type = 'test';
				break;
			default:
				$message = "La partie n'ap pas pu être créée !";
				return redirect('/cours/'.$chapter->course_id.'/'.$chapter->id)->withMessage($message);
		}
		$part = new Part;
		$part->chapter_id = $chapter->id;
		$part->order_id = Part::where('chapter_id', $chapter->id)->max('order_id') + 1;
		$part->type = $type;
		$part->save();

		$chapter = Chapter::find($chapter->id);
		$chapter->part_nb = Part::where('chapter_id', $chapter->id)->max('order_id');
        $chapter->save();

        $message = "La partie a été créé avec succès !";
        return redirect('/cours/'.$chapter->course_id.'/'.$chapter->id.'/'.$part->order_id)->withMessage($message);
    }

	/**
	 * Show the edition view of the given part.
	 *
	 * @var $course
	 *		The course containing the chapter.
	 * @var $chapter
	 *		The chapter containing the part.
	 * @var $part
	 *		The part to edit.
	 */
    public function showEditView(Course $course, Chapter $chapter, Part $part)
    {
		if ($course->creator_id == Auth::user()->id) {
			return view('authenticated.edit.edit', compact('course', 'chapter', 'part'));
		}
		$message = "Vous n'êtes pas autorisé à voir cette page !";
		return redirect()->back()->withMessage($message);
    }

	/**
	 * Save the part into the database.
	 *
	 * @var $request
	 *		The request contains:
	 *			the html code of the theoric part
	 *			or the quiz.
	 */
	public function store(Request $request)
	{
		$part = Part::find($request->part);

		if ($part->type == 'theory') {
			$part->body = $request->html;
		} else {
			$part->body = $request->quiz;
		}

		$part->save();
	}
}
