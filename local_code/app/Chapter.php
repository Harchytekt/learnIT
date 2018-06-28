<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enrollment;
use App\Part;
use App\Test;
use Auth;

class Chapter extends Model
{

	/**
	 * This function returns the number of tested chapters.
	 *
	 * @var $chapters
	 *		The array of counted chapters.
	 */
	public function countChapters($chapters)
	{
		$chapterNb = 0;
		foreach ($chapters as $chapter) {
			$enrollment = Enrollment::where('student_id', Auth::user()->id)->where('course_id', $chapter->course_id)->first();
			$test = Test::where('enrollment_id', $enrollment->id)->where('chapter_id', $chapter->id)->first();
			if ($test !== null && $test->tested == 1) {
				$chapterNb++;
			}
		}
		return $chapterNb;
	}

	/**
	 * This function returns all the chapters.
	 *
	 * @param $published
	 *		If the value is 1, it only returns the published chapters.
	 *		Otherwise, the value is 0 and the returned
	 *		chapters are the unpublished ones.
	 */
	public static function getAllChapters(int $published) {
        return static::where('published', $published)->get();
    }

	/**
	 * This function returns the result for all the chapters of a course.
	 */
	public function getAllResults()
	{
		$result = 0;
		$enrollments = Enrollment::where('course_id', $this->course_id)->get();
		$studentsNb = $enrollments->count();
		if ($studentsNb == 0)
			return 0;

		foreach ($enrollments as $enrollment) {
			$test = Test::where('enrollment_id', $enrollment->id)->where('chapter_id', $this->id)->first();
			if ($test === null) {
				$studentsNb--;
			} else {
				$result += $test->getResult(true) * 10;
			}
		}
		if ($result == 0)
			return $result;

		$result = $result / $studentsNb;

		if (is_float($result))
			return round($result, 2);
		return $result;
	}

	/**
	 * This function returns lock state of the chapter.
	 * There are three states:
	 *	- 0 if the order id is less than 3 (unlocked by default).
	 *	- 1 if the chapter has already been passed (unlocked).
	 *	- 2 in the last case (locked).
	 */
	public function getLockState() {
		if ($this->order_id < 3)
			return 0;

		try {
			$test = Test::getTest(Enrollment::getEnrollment($this->course_id)->id, $this->order_id - 1);
			return ($test->passed == 1) ? 1 : 2;
		} catch (\Exception $e) {
			return 2;
		}
    }

	/**
	 * This function returns the number of passed chapters.
	 */
	public static function getNumberOfPassedChapters() {
		$nbOfPassed = 0;
		$publishedChapters = static::getAllChapters(1);
        foreach ($publishedChapters as $chapter) {
        	$nbOfPassed += ($chapter->isPassed()) ? 1 : 0;
        }
		return $nbOfPassed;
    }

	/**
	 * This function returns the result of the chapter.
	 *
	 * @var $best
	 *		If true, the returned value is the best result.
	 *		Otherwise, the value is the last result.
	 */
	public function getResult($best)
	{
		$enrollment = Enrollment::where('student_id', Auth::user()->id)->where('course_id', $this->course_id)->first();
		$test = Test::where('enrollment_id', $enrollment->id)->where('chapter_id', $this->id)->first();

		if ($test !== null) {
			return $test->getResult($best) * 10;
		}
	}

	/**
	 * This function returns the number of tests (tested or passed).
	 */
	public function getTestNumber()
	{
		$enrollment = Enrollment::where('student_id', Auth::user()->id)->where('course_id', $this->course_id)->first();
		$test = Test::where('enrollment_id', $enrollment->id)->where('chapter_id', $this->id)->first();

		if ($test !== null) {
			return $test->getTestNumber();
		}
	}

	/**
	 * This function returns if the chapter is the last
	 * of the course.
	 */
	public function isLast()
	{
		return $this->max('order_id') == $this->order_id;
	}

	/**
	 * This function returns if the chapter has already been passed.
	 */
	public function isPassed()
	{
		$enrollment = Enrollment::where('student_id', Auth::user()->id)->where('course_id', $this->course_id)->first();
		if ($enrollment === null)
			return false;

		$test = Test::where('enrollment_id', $enrollment->id)->where('chapter_id', $this->id)->first();
		if ($test === null) {
			return false;
		}
		return $test->isPassed();
	}

    /**
	 * This function returns if the chapter is published.
	 */
	public function isPublished() {
        return $this->published == 1;
    }

	/**
	 * This function returns if the chapter has already been tested.
	 */
	public function isTested()
	{
		$enrollment = Enrollment::where('student_id', Auth::user()->id)->where('course_id', $this->course_id)->first();
		$test = Test::where('enrollment_id', $enrollment->id)->where('chapter_id', $this->id)->first();
		if ($test === null) {
			return false;
		}
		return $test->isTested();
	}

	/**
	 * This function returns if last part of the chapter is a test.
	 * If true, the chapter is finished.
	 */
	public function lastPartIsTest()
	{
		$part = Part::where('chapter_id', $this->id)->where('order_id', $this->part_nb)->first();
		return $part->type == 'test';
	}

	/**
	 * This function is used to publish a chapter.
	 *
	 * @var $chapter
	 *		The chapter to publish.
	 */
	public static function publish(Chapter $chapter) {
		return static::where('id', $chapter->id)->update(['published' => 1]);
	}
}
