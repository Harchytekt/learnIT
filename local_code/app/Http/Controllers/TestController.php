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
			$test = new Test;
			$test->enrollment_id = $enrollId;
			$test->chapter_id = $request->chapterId;
			$test->bestResult = $result;
			$test->testNumber = 1;
			$test->tested = 1;
			$test->passed = ($result > 7) ? 1 : 0;
			$test->tested_at = new \DateTime();
		} else {
			$test = Test::getTest($enrollId, $chapterId);

			if ($result > $test->bestResult) {
				$test->bestResult = $result;
			}
			$test->testNumber = $test->testNumber + 1;
			if ($test->passed == 0 && $result > 7) {
				$test->passed = 1;
			}
		}

		$test->result = $result;

		$test->save();
	}
}
