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

    public function showCoursesList()
    {
        return view('authenticated.mesChiffres.inscrits');
    }

    public function showChaptersList(Course $course)
    {
        return view('authenticated.mesChiffres.chapters', compact('course'));
    }

    public function showWrittenCoursesList()
    {
        return view('authenticated.mesChiffres.ecrits');
    }

    public function showWrittenChaptersList(Course $course)
    {
        return view('authenticated.mesChiffres.writtenChapters', compact('course'));
    }
}
