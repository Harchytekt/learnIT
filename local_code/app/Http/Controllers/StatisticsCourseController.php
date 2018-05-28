<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Course;
use App\Enrollment;
use App\Favorite;
use Auth;

class StatisticsCourseController extends Controller
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
	 * Show the view of the statistics of the chapters
	 * of the given course.
	 * The current user has to be enrolled to that course.
	 *
	 * @var $course
	 *		The course which contains the chapters.
	 */
    public function showChaptersList(Course $course)
    {
        return view('authenticated.mesChiffres.chapitresInscrits', compact('course'));
    }

	/**
	 * Show the view of all the enrolled courses of the current user.
	 */
    public function showCoursesList()
    {
        return view('authenticated.mesChiffres.coursInscrits');
    }

	/**
	 * Show the view of all the written courses of the current user.
	 */
    public function showWrittenCoursesList()
    {
        return view('authenticated.mesChiffres.coursEcrits');
    }

	/**
	 * Show the view of the statistics of the chapters
	 * of the given course.
	 * The current user has to be the creator of that course.
	 *
	 * @var $course
	 *		The course which contains the chapters.
	 */
    public function showWrittenChaptersList(Course $course)
    {
        return view('authenticated.mesChiffres.chapitresEcrits', compact('course'));
    }
}
