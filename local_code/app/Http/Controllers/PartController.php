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

    public function showEditView(Course $course, Chapter $chapter, int $partOrderId)
    {
		if ($course->creator_id == Auth::user()->id) {
			$part = Part::where('chapter_id', $chapter->id)->where('order_id', $partOrderId)->first();
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
}
