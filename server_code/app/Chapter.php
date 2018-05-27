<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enrollment;
use App\Part;
use App\Test;
use Auth;

class Chapter extends Model
{
    public function isPublished() {
        return $this->published == 1;
    }

	public function isLast()
	{
		return $this->max('order_id') == $this->order_id;
	}

	public function isPassed()
	{
		$enrollment = Enrollment::where('student_id', Auth::user()->id)->where('course_id', $this->course_id)->first();
		$test = Test::where('enrollment_id', $enrollment->id)->where('chapter_id', $this->id)->first();
		if ($test === null) {
			return false;
		}
		return $test->isPassed();
	}

	public function isTested()
	{
		$enrollment = Enrollment::where('student_id', Auth::user()->id)->where('course_id', $this->course_id)->first();
		$test = Test::where('enrollment_id', $enrollment->id)->where('chapter_id', $this->id)->first();
		if ($test === null) {
			return false;
		}
		return $test->isTested();
	}

    public static function numberOfPassedChapters() {
		$nbOfPassed = 0;
		$publishedChapters = static::getAllChapters(1);
        foreach ($publishedChapters as $chapter) {
        	$nbOfPassed += ($chapter->isPassed()) ? 1 : 0;
        }
		return $nbOfPassed;
    }

	public static function getAllChapters(int $published) {
        return static::where('published', $published)->get();
    }

	// 0: unlocked by default, 1: unlocked, 2: locked
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

	public function getResult($best)
	{
		$enrollment = Enrollment::where('student_id', Auth::user()->id)->where('course_id', $this->course_id)->first();
		$test = Test::where('enrollment_id', $enrollment->id)->where('chapter_id', $this->id)->first();

		/*if ($test === null) {
			return 0;
		}*/
		if ($test !== null) {
			return $test->getResult($best) * 10;
		}
	}

	public function getTestNumber()
	{
		$enrollment = Enrollment::where('student_id', Auth::user()->id)->where('course_id', $this->course_id)->first();
		$test = Test::where('enrollment_id', $enrollment->id)->where('chapter_id', $this->id)->first();

		if ($test !== null) {
			return $test->getTestNumber();
		}
	}

	public static function publish(Chapter $chapter) {
		return static::where('id', $chapter->id)->update(['published' => 1]);
	}

	public function lastPartIsTest()
	{
		$part = Part::where('chapter_id', $this->id)->where('order_id', $this->part_nb)->first();
		return $part->type == 'test';
	}

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
}
