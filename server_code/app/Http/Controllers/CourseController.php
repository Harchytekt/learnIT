<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Course;
use App\Enrollment;
use App\Favorite;
use Auth;

class CourseController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all()->sortBy('name');
        return view('authenticated.cours', compact('courses'));
    }

	public function changeEnrollmentState(Course $course)
	{
		Enrollment::setEnrollmentStatus($course);
		return redirect()->back();
	}

	public function changeFavoriteState(Course $course)
	{
		Favorite::setFavoriteStatus($course);
		return redirect()->back();
	}

	public function publish(Course $course)
	{
		Course::publish($course);
		$message = "Le cours a été publié avec succès !";
		return redirect()->back()->withMessage($message);
	}

    public function showEnrollments()
    {
        $courses = '';
        $enrIDs = Enrollment::getAllEnrollments(); // Array of enrollments courses IDs
        if (Enrollment::numberOfEnrollments() != 0) {
            $courses = Course::getCourseFromIDArray($enrIDs);
        }

        return view('authenticated.mesCours.inscrits', compact('courses'));
    }

    public function showFavorites()
    {
        $courses = '';
        $favIDs = Favorite::getAllFavorites(); // Array of favorites courses IDs
        if (Favorite::numberOfFavorites() != 0) {
            $courses = Course::getCourseFromIDArray($favIDs);
        }

        return view('authenticated.mesCours.favoris', compact('courses'));
    }

    public function showInProgress()
    {
        $courses = '';
        $enrIDs = Enrollment::getInProgressEnrollments(); // Array of in progress courses IDs
        if (Enrollment::numberOfEnrollments() != 0) {
            $courses = Course::getCourseFromIDArray($enrIDs);
        }

        return view('authenticated.mesCours.encours', compact('courses'));
    }

    public function showUnpublishedCourses()
    {
        $courses = '';
        if (Auth::user()->isATutor()) {
            $courses = Course::getWrittenCourses(Auth::user()->id)->where('published', 0);
        }

        return view('authenticated.ecrire', compact('courses'));
    }

    public function showWritten()
    {
        $courses = '';
        if (Auth::user()->isATutor()) {
            $courses = Course::getWrittenCourses(Auth::user()->id);
        }

        return view('authenticated.mesCours.ecrits', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('authenticated.show', compact('course'));
    }

	public function initCourse() {
		return view('authenticated.initCours');
	}

    public function courseInitialization(Request $request) {
		Validator::make($request->all(), [
			'name' => 'required|unique:courses|string|min:2|max:255|regex:/([A-Za-zÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ0-9 \'\(\)-])/',
	        'description' => 'required|string|min:6|max:512|regex:/([A-Za-zÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ0-9 &@\'.,!?;:\/=+*%\(\)°€$-])/',
		])->validate();

        $course = new Course;
		$course->name = request('name');
        $course->description = request('description');
		$course->creator_id = Auth::user()->id;
        $course->save();

        $message = "Le cours a été créé avec succès !";
        return redirect('/ecrire')->withMessage($message);
    }
}
