<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Favorite extends Model
{
	public $timestamps = false; // To create a new favorite without timestamp

	/**
	 * This function adds a course to the favorites of the current user.
	 *
	 * @var $course
	 *		The course to add as favorite.
	 */
	public static function addFavorite(Course $course)
	{
	    $fav = new Favorite;

	    $fav->student_id = Auth::user()->id;
	    $fav->course_id = $course->id;
	    $fav->save();
	}

	/**
	 * This function gets all the favorite courses of the current user.
	 */
	public static function getAllFavorites() {
        return static::where('student_id', Auth::user()->id)
            ->pluck('course_id')->toArray();
    }

	/**
	 * This function returns the number of favorite courses
	 * of the current user.
	 */
	public static function getNumberOfFavorites() {
        return static::where('student_id', Auth::user()->id)->count();
    }

	/**
	 * This function returns if the given course is one of
	 * favorites of the current user.
	 *
	 * @var $course
	 *		The course you want to know if it is a favorite.
	 */
	public static function isFavorite(Course $course) {
        return static::where('course_id', $course->id)->where('student_id', Auth::user()->id)->count() == 1;
    }

	/**
	 * This function changes the status of the course.
	 * The course may be added or deleted from the favorites
	 * of the current users.
	 *
	 * @var $course
	 *		The course whose status must be changed.
	 */
	public static function setFavoriteStatus(Course $course) {
		if (self::isFavorite($course)) {
			return static::where('course_id', $course->id)->where('student_id', Auth::user()->id)->delete();
		}
		self::addFavorite($course);
    }
}
