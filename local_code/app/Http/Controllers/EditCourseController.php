<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Course;
use App\Enrollment;
use App\Favorite;
use Auth;

class EditCourseController extends Controller
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
	 * Show the edit view of a course.
	 *
	 * @var $course
	 *		The course to edit.
	 */
    public function show(Course $course)
    {
        return view('authenticated.edit.show', compact('course'));
    }
}
