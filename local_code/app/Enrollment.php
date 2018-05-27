<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Chapter;
use App\Course;
use Auth;

class Enrollment extends Model
{
	public $timestamps = false; // To create a new enrollment without timestamp

	public function isCompleted()
	{
		return $this->completed == 1;
	}

	public static function numberOfEnrollments() {
        return static::where('student_id', Auth::user()->id)->count();
    }

    public static function numberOfInProgressEnrollments() {
        return static::where('student_id', Auth::user()->id)
            ->where('completed', 0)->count();
    }

    public static function numberOfCompletedEnrollments() {
        return static::where('student_id', Auth::user()->id)
            ->where('completed', 1)->count();
    }

	public static function getAverage()
	{
		$coursesId = static::getAllEnrollments();
		$coursesNb = (new Course)->countCourses($coursesId);
		$result = 0;

		foreach ($coursesId as $course_id) {
			$result += Course::where('id', $course_id)->first()->getAverage();
		}
		$result = $result / $coursesNb;

		if (is_float($result))
			return round($result, 2);
		return $result;
	}

    public static function getAllEnrollments() {
        return static::where('student_id', Auth::user()->id)
            ->pluck('course_id')->toArray();
    }

    public static function getInProgressEnrollments() {
        return static::where('student_id', Auth::user()->id)
            ->where('completed', 0)
            ->pluck('course_id')->toArray();
    }

    public static function isAnEnrollment(Course $course) {
        return static::where('course_id', $course->id)->where('student_id', Auth::user()->id)->count() == 1;
    }

    public static function setEnrollmentStatus(Course $course) {
		if (self::isAnEnrollment($course)) {
			return static::where('course_id', $course->id)->where('student_id', Auth::user()->id)->delete();
		}
		self::addEnrollment($course);
    }

	public static function addEnrollment(Course $course)
	{
	    $enroll = new Enrollment;

	    $enroll->student_id = Auth::user()->id;
	    $enroll->course_id = $course->id;
	    $enroll->save();
	}

	public static function getEnrollment(int $courseId)
	{
		return static::where('course_id', $courseId)->where('student_id', Auth::user()->id)->first();
	}
}
