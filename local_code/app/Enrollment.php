<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Enrollment extends Model
{
	public $timestamps = false; // To create a new favorite without timestamp

	public static function numberOfEnrollments() {
        return static::where('student_id', Auth::user()->id)->count();
    }

    public static function numberOfInProgressEnrollments() {
        return static::where('student_id', Auth::user()->id)
            ->where('completed', 0)->count();
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
        return static::where('course_id', $course->id)->count() == 1;
    }

    public static function setEnrollmentStatus(Course $course) {
		if (self::isAnEnrollment($course)) {
			return static::where('course_id', $course->id)->delete();
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
}
