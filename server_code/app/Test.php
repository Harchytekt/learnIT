<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Chapter;
use App\Enrollment;

class Test extends Model
{
    public $timestamps = false; // To create a new test without timestamp

	/**
	 * This function creates and saves a new test.
	 *
	 * @var $enrollId
	 *		The enrollment ID linked to the new test.
	 * @var $chapterId
	 *		The chapter ID linked to the new test.
	 * @var $result
	 *		The result of the new test.
	 */
	public function createAndNote(int $enrollId, int $chapterId, int $result)
	{
		$test = new Test;

		$test->enrollment_id = $enrollId;
		$test->chapter_id = $chapterId;
		$test->bestResult = $result;
		$test->testNumber = 1;
		$test->tested = 1;
		$test->passed = ($result > 7) ? 1 : 0;
		$test->tested_at = new \DateTime();
		$test->result = $result;

		$test->save();

		$test->setEnrollmentCompleted();
	}

	/**
	 * This function returns the result of the test.
	 *
	 * @var $best
	 *		If true, the returned value is the best result.
	 *		Otherwise, the value is the last result.
	 */
	public function getResult($best)
	{
		if ($best)
			return $this->bestResult;
		return $this->result;
	}

	/**
	 * This function returns the test linked by the given
	 * enrollment and chapter.
	 *
	 * @var $enrollId
	 *		The ID of the enrollment.
	 * @var $chapterId
	 *		The ID of the chapter.
	 */
	public static function getTest(int $enrollId, int $chapterId)
	{
		// If not static, gets a status 500 (Internal Server Error)
		return static::where('enrollment_id', $enrollId)->where('chapter_id', $chapterId)->first();
	}

	/**
	 * This function returns the number of times
	 * that the chapter has been tested by the user.
	 */
	public function getTestNumber()
	{
		return $this->testNumber;
	}

	/**
	 * This function returns if the test has already been passed.
	 */
	public function isPassed()
	{
		return $this->passed == 1;
	}

	/**
	 * This function returns if the test has already been tested.
	 */
	public function isTested()
	{
		return $this->tested == 1;
	}

	/**
	 * This function update the test with the given result.
	 *
	 * @var $result
	 *		The new result of the test.
	 */
	public function note(int $result)
	{
		if ($result > $this->bestResult) {
			$this->bestResult = $result;
		}

		$this->testNumber = $this->testNumber + 1;

		if ($this->passed == 0 && $result > 7) {
			$this->passed = 1;
		}

		$this->result = $result;

		$this->save();

		$this->setEnrollmentCompleted();
	}

	/**
	 * This function sets an enrollment as completed.
	 */
	public function setEnrollmentCompleted()
	{
		$currentChapter = Chapter::find($this->chapter_id);
		$enrollment = Enrollment::find($this->enrollment_id);
		if ($this->passed == 1 && $currentChapter->isLast() && !$enrollment->isCompleted()) {
			$enrollment->completed = 1;
			$enrollment->completion_at = new \DateTime();
			$enrollment->save();
		}
	}
}
