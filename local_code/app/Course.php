<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Auth;
use App\Chapter;
use App\Enrollment;

class Course extends Model
{
	protected $fillable = ['published', 'name', 'description'];

	/**
	 * This function returns if the course is published.
	 */
	public function isPublished() {
        return $this->published == 1;
    }

	/**
	 * This function returns if the course is finished.
	 */
	public function isFinished() {
        return $this->finished == 1;
    }


	/**
	 * This function returns if all the chapters are tested.
	 */
	public function isTested() {
		$chapters = $this->getAllPublishedChapters();
		foreach ($chapters as $chapter) {
			if ($chapter->isTested())
				return true;
		}
		return false;
	}

	/**
	 * This function returns if the course is completed.
	 */
	public function isCompleted()
	{
		$enrollment = Enrollment::where('student_id', Auth::user()->id)->where('course_id', $this->id)->first();
		if ($enrollment === null) {
			return false;
		}
		return $enrollment->isCompleted();
	}

	/**
	 * This function returns if the course can be set as finished.
	 * For that, it must contains at least 3 published chapters.
	 */
    public function canBeFinished() {
        return Chapter::where('course_id', $this->id)->where('published', 1)->count() > 2;
    }

	/**
	 * This function is used to publish a course.
	 *
	 * @var $course
	 *		The course to publish.
	 */
	public static function publish(Course $course) {
		return static::where('id', $course->id)->update(['published' => 1]);
	}

	/**
	 * This function is used to set a course as finished.
	 *
	 * @var $course
	 *		The course to set a course as finished.
	 */
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

	/**
	 * This function returns all the chapters of the course.
	 */
	public function getAllChapters()
	{
		return Chapter::where('course_id', $this->id)->get();
	}

	/**
	 * This function gets the number of courses written by the current user.
	 */
	public static function getNumberOfWrittenCourses()
	{
		return static::where('creator_id', Auth::user()->id)->count();
	}

	/**
	 * This function gets an array containing the ID's of
	 * all the chapters written by the current user.
	 */
	public static function getAllWrittenCourses()
	{
		return static::where('creator_id', Auth::user()->id)->pluck('id')->toArray();
	}

	/**
	 * This function gets the number of all the enrolled users
	 * of all the written courses of the current user.
	 */
	public static function getStudentsOfAllMyCourses()
	{
		$courses = static::where('creator_id', Auth::user()->id)->get();
		$nbOfStudents = 0;
		foreach ($courses as $course) {
			$nbOfStudents += $course->getStudentsNumber();
		}

		return $nbOfStudents;
	}

	/**
	 * This function gets the number of enrolled student
	 * for a given course.
	 */
	public function getStudentsNumber()
	{
		return Enrollment::where('course_id', $this->id)->count();
	}

	/**
	 * This function gets all the published chapters of a course.
	 */
	public function getAllPublishedChapters()
	{
		return Chapter::where('course_id', $this->id)->where('published', 1)->get();
	}

	/**
	 * This function gets the average result from a course.
	 *
	 * @var $isWritten
	 *		If true, the average is calculated for all the enrolled users.
	 *		Otherwise, this is only for the current user.
	 */
	public function getAverage($isWritten)
	{
		$chapters = $this->getAllPublishedChapters();
		$chaptersNb = (new Chapter)->countChapters($chapters);
		$result = 0;

		foreach ($chapters as $chapter) {
			if ($isWritten) {
				$tempResult = $chapter->getAllResults();
			} else {
				$tempResult = $chapter->getResult(true);
			}

			if ($tempResult != -1) {
				$result += $tempResult;
			}
		}
		if ($result == 0)
			return $result;

		$result = $result / $chaptersNb;

		if (is_float($result))
			return round($result, 2);
		return $result;
	}

	/**
	 * This function gets courses from a given array of ID's.
	 *
	 * @var $IDArray
	 *		The array of ID's.
	 */
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

	/**
	 * This function returns if the course is an enrollment
	 * for the current user.
	 */
	public function isEnrollment() {
        return in_array($this->id, Enrollment::getAllEnrollments());
    }

	/**
	 * This function returns if the course is a favorite
	 * for the current user.
	 */
	public function isFavorite() {
        return in_array($this->id, Favorite::getAllFavorites());
    }

	/**
	 * This function returns if the course has comments.
	 */
	public function hasComments() {
        return $this->comments->count() != 0;
    }

	/**
	 * This function gets the written courses of the given user.
	 *
	 * @var $userId
	 *		The ID of the user.
	 */
	public static function getWrittenCourses(int $userId) {
		$collection = collect(static::where('creator_id', $userId)->get());
		return $collection->sortBy('name');
    }

	/**
	 * This function returns if the current user is the creator (tutor)
	 * of the current course.
	 */
	public function userIsTutor()
	{
		return Auth::user()->id == $this->creator_id;
	}

	/**
	 * This function counts the number of tested courses
	 * from an array of courses ID's.
	 *
	 * @var $coursesId
	 *		The array of ID's.
	 */
	public function countCourses($coursesId)
	{
		$coursesNb = 0;
		foreach ($coursesId as $id) {
			if (Course::where('id', $id)->first()->canBeCounted()) {
				$coursesNb++;
			}
		}
		return $coursesNb;
	}

	/**
	 * This function returns true if all the chapters
	 * of the course have already been tested.
	 */
	public function canBeCounted()
	{
		$chapters = Chapter::where('course_id', $this->id)->get();

		foreach ($chapters as $chapter) {
			if ($chapter->isTested()) {
				return true;
			}
		}
		return false;
	}
}
