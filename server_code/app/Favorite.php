<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Favorite extends Model
{
	public $timestamps = false; // To create a new favorite without timestamp

	public static function numberOfFavorites() {
        return static::where('student_id', Auth::user()->id)->count();
    }

    public static function getAllFavorites() {
        return static::where('student_id', Auth::user()->id)
            ->pluck('course_id')->toArray();
    }

    public static function isFavorite(Course $course) {
        return static::where('course_id', $course->id)->count() == 1;
    }

    public static function setFavoriteStatus(Course $course) {
		if (self::isFavorite($course)) {
			return static::where('course_id', $course->id)->delete();
		}
		self::addFavorite($course);
    }

	public static function addFavorite(Course $course)
	{
	    $fav = new Favorite;

	    $fav->student_id = Auth::user()->id;
	    $fav->course_id = $course->id;
	    $fav->save();
	}
}
