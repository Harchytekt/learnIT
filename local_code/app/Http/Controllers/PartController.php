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

    public function showEditView(Course $course, Chapter $chapter, Part $part)
    {
		if ($course->creator_id == Auth::user()->id) {
			return view('authenticated.edit.edit', compact('course', 'chapter', 'part'));
		}
		$message = "Vous n'êtes pas autorisé à voir cette page !";
		return redirect()->back()->withMessage($message);
    }

	public function store(Request $request)
	{
		$part = Part::find($request->part);
		$part->body = $request->html;
		$part->save();
	}

    public function partInitialization(Chapter $chapter) {
		$part = new Part;
		$part->chapter_id = $chapter->id;
		$part->order_id = Part::where('chapter_id', $chapter->id)->max('order_id') + 1;
		$part->save();

		$chapter = Chapter::find($chapter->id);
		$chapter->part_nb = Part::where('chapter_id', $chapter->id)->max('order_id');
        $chapter->save();

        $message = "La partie a été créé avec succès !";
        return redirect('/cours/'.$chapter->course_id.'/'.$chapter->id.'?part='.$part->id)->withMessage($message);
    }
}
