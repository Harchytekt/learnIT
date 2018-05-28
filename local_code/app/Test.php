<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Chapter;
use App\Enrollment;

class Test extends Model
{
    public $timestamps = false; // To create a new test without timestamp

	public function isPassed()
	{
		return $this->passed == 1;
	}

	public function isTested()
	{
		return $this->tested == 1;
	}

	public function getResult($best)
	{
		if ($best)
			return $this->bestResult;
		return $this->result;
	}

	public function getTestNumber()
	{
		return $this->testNumber;
	}

	public static function getTest(int $enrollId, int $chapterId)
	{
		// If not static, gets a status 500 (Internal Server Error)
		return static::where('enrollment_id', $enrollId)->where('chapter_id', $chapterId)->first();
	}

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
