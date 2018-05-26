<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Auth;
use App\Chapter;

class Course extends Model
{
	protected $fillable = ['published', 'name', 'description'];

    public function isPublished() {
        return $this->published == 1;
    }

    public function isFinished() {
        return $this->finished == 1;
    }

	/**
	 * This function returns if the course can be set as finished.
	 * For that, it must contains at least 3 published chapters.
	 */
    public function canBeFinished() {
        return Chapter::where('course_id', $this->id)->where('published', 1)->count() > 2;
    }

	public static function publish(Course $course) {
		return static::where('id', $course->id)->update(['published' => 1]);
	}

	public static function finish(Course $course) {
		return static::where('id', $course->id)->update(['finished' => 1]);
	}

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user() // $course->user -- $comment->course->user
    {
        return $this->belongsTo(User::class);
    }

    public static function getCourseFromIDArray($IDArray) {
        foreach ($IDArray as $i => $value) {
            if ($i == 0) {
                $collection = collect(static::where('id', $value)->get());
            } else {
                $collection = $collection->concat(static::where('id', $value)->get());
            }
        }
        return $collection->sortBy('name');
    }

    public function isEnrollment() {
        return in_array($this->id, Enrollment::getAllEnrollments());
    }

    public function isFavorite() {
        return in_array($this->id, Favorite::getAllFavorites());
    }

    public function hasComments() {
        return $this->comments->count() != 0;
    }

	public static function getWrittenCourses(int $userId) {
		$collection = collect(static::where('creator_id', $userId)->get());
		return $collection->sortBy('name');
    }

	public function userIsTutor()
	{
		return Auth::user()->id == $this->creator_id;
	}
}
