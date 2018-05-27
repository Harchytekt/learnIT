<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Course;
use App\Enrollment;
use App\Test;
use Auth;

class TestController extends Controller
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

	public function store(Request $request)
	{
		$courseId = $request->courseId;
		$chapterId = $request->chapterId;
		$result = $request->result;

		if (Enrollment::getEnrollment($courseId) === null) {
			Enrollment::addEnrollment(Course::where('id', $courseId)->first());
		}
		$enrollId = Enrollment::getEnrollment($courseId)->id;

		if (Test::getTest($enrollId, $chapterId) === null) {
			Test::createAndNote($enrollId, $chapterId, $result);
		} else {
			$test = Test::getTest($enrollId, $chapterId);
			$test->note($result);
		}
	}
}
