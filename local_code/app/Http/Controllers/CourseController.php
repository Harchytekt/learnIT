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

	/**
	 * Change the enrollment status and go back to the view.
	 */
	public function changeEnrollmentState(Course $course)
	{
		Enrollment::setEnrollmentStatus($course);
		return redirect()->back();
	}

	/**
	 * Change the favorite status and go back to the view.
	 */
	public function changeFavoriteState(Course $course)
	{
		Favorite::setFavoriteStatus($course);
		return redirect()->back();
	}

	/**
	 * Initialize a new course.
	 *
	 * @var $request
	 *		The request contains the data of the course.
	 */
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

	/**
	 * Set the course as finished.
	 */
	public function finish(Course $course)
	{
		Course::finish($course);
		$message = "La rédaction du cours a été terminée avec succès !";
		return redirect()->back()->withMessage($message);
	}

	/**
	 * Show the initialisation view of a new course.
	 */
	public function initCourse() {
		$type = 'cours';
		return view('authenticated.init', compact('type'));
	}

	/**
	 * Publish the given course.
	 *
	 * @var $course
	 *		The course to publish.
	 */
	public function publish(Course $course)
	{
		Course::publish($course);
		$message = "Le cours a été publié avec succès !";
		return redirect()->back()->withMessage($message);
	}

	/**
	 * Show the given course if possible.
	 *
	 * @var $course
	 *		The course to show.
	 */
    public function show(Course $course)
    {
        if ($course->creator_id == Auth::user()->id || $course->isPublished()) {
			return view('authenticated.show', compact('course'));
		}
		$message = "Vous n'êtes pas autorisé à voir ce cours !";
		return redirect()->back()->withMessage($message);
    }

	/**
	 * Show the view of all the enrollments of the current user.
	 */
    public function showEnrollments()
    {
        $courses = '';
        $enrIDs = Enrollment::getAllEnrollments(); // Array of enrollments courses IDs
        if (Enrollment::getNumberOfEnrollments() != 0) {
            $courses = Course::getCourseFromIDArray($enrIDs);
        }

        return view('authenticated.mesCours.inscrits', compact('courses'));
    }

	/**
	 * Show the view of all the favorites of the current user.
	 */
    public function showFavorites()
    {
        $courses = '';
        $favIDs = Favorite::getAllFavorites(); // Array of favorites courses IDs
        if (Favorite::getNumberOfFavorites() != 0) {
            $courses = Course::getCourseFromIDArray($favIDs);
        }

        return view('authenticated.mesCours.favoris', compact('courses'));
    }

	/**
	 * Show the view of all the enrollments in progress of the current user.
	 */
    public function showInProgress()
    {
        $courses = '';
        $enrIDs = Enrollment::getInProgressEnrollments(); // Array of in progress courses IDs
        if (Enrollment::getNumberOfEnrollments() != 0) {
            $courses = Course::getCourseFromIDArray($enrIDs);
        }

        return view('authenticated.mesCours.encours', compact('courses'));
    }

    /**
	 * Show the view containing the unpublished courses of the current user.
	 */
	public function showUnpublishedCourses()
    {
        $courses = '';
        if (Auth::user()->isATutor()) {
            $courses = Course::getWrittenCourses(Auth::user()->id)->where('published', 0);
        }

        return view('authenticated.ecrire', compact('courses'));
    }

	/**
	 * Show the view containing the courses written by the current user.
	 */
	public function showWritten()
    {
        $courses = '';
        if (Auth::user()->isATutor()) {
            $courses = Course::getWrittenCourses(Auth::user()->id);
        }

        return view('authenticated.mesCours.ecrits', compact('courses'));
    }
}
