<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enrollment;
use App\Part;
use App\Test;

class Chapter extends Model
{
    public function isPublished() {
        return $this->published == 1;
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

	public static function publish(Chapter $chapter) {
		return static::where('id', $chapter->id)->update(['published' => 1]);
	}

	public function lastPartIsTest()
	{
		$part = Part::where('chapter_id', $this->id)->where('order_id', $this->part_nb)->first();
		return $part->type == 'test';
	}
}
