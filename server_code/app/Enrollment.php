<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Chapter;
use App\Course;
use Auth;

class Enrollment extends Model
{
	public $timestamps = false; // To create a new enrollment without timestamp

	/**
	 * This function adds a course to the enrollments of the current user.
	 *
	 * @var $course
	 *		The course to add as enrollment.
	 */
	public static function addEnrollment(Course $course)
	{
	    $enroll = new Enrollment;

	    $enroll->student_id = Auth::user()->id;
	    $enroll->course_id = $course->id;
	    $enroll->save();
	}

	/**
	 * This function gets all the enrolled courses of the current user.
	 */
	public static function getAllEnrollments() {
        return static::where('student_id', Auth::user()->id)
            ->pluck('course_id')->toArray();
    }

	/**
	 * This function gets the average result from a enrollment.
	 *
	 * @var $isWritten
	 *		If true, the average is calculated for all the enrolled users.
	 *		Otherwise, this is only for the current user.
	 */
	public static function getAverage($isWritten)
	{
		if ($isWritten) {
			$coursesId = (new Course)->getAllWrittenCourses();
		} else {
			$coursesId = static::getAllEnrollments();
		}

		$coursesNb = (new Course)->countCourses($coursesId);
		if ($coursesNb == 0)
			return 0;

		$result = 0;

		foreach ($coursesId as $course_id) {
			$result += Course::where('id', $course_id)->first()->getAverage($isWritten);
		}
		$result = $result / $coursesNb;

		if (is_float($result))
			return round($result, 2);
		return $result;
	}

	/**
	 * This function gets the enrollment for the given course.
	 *
	 * @var $courseId
	 *		The ID of the course whose enrollment is retrieved.
	 */
	public static function getEnrollment(int $courseId)
	{
		return static::where('course_id', $courseId)->where('student_id', Auth::user()->id)->first();
	}

	/**
	 * This function gets all the enrollments in progress for the current user.
	 */
	public static function getInProgressEnrollments() {
        return static::where('student_id', Auth::user()->id)
            ->where('completed', 0)
            ->pluck('course_id')->toArray();
    }

	/**
	 * This function returns the number of completed enrollments.
	 */
	public static function getNumberOfCompletedEnrollments() {
        return static::where('student_id', Auth::user()->id)
            ->where('completed', 1)->count();
    }

	/**
	 * This function returns the number of enrolled courses
	 * of the current user.
	 */
	public static function getNumberOfEnrollments() {
        return static::where('student_id', Auth::user()->id)->count();
    }

	/**
	 * This function returns the number of in progress enrollments.
	 */
	public static function getNumberOfInProgressEnrollments() {
        return static::where('student_id', Auth::user()->id)
            ->where('completed', 0)->count();
    }

	/**
	 * This function returns if the given course is one of
	 * enrollments of the current user.
	 *
	 * @var $course
	 *		The course you want to know if it is a enrollment.
	 */
	public static function isAnEnrollment(Course $course) {
        return static::where('course_id', $course->id)->where('student_id', Auth::user()->id)->count() == 1;
    }

	/**
	 * This function returns if the enrollment is completed.
	 */
	public function isCompleted()
	{
		return $this->completed == 1;
	}

	/**
	 * This function changes the status of the course.
	 * The course may be added or deleted from the enrollments
	 * of the current users.
	 *
	 * @var $course
	 *		The course whose status must be changed.
	 */
	public static function setEnrollmentStatus(Course $course) {
		if (self::isAnEnrollment($course)) {
			return static::where('course_id', $course->id)->where('student_id', Auth::user()->id)->delete();
		}
		self::addEnrollment($course);
    }
}
