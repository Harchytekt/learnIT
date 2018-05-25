<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public $timestamps = false; // To create a new test without timestamp

	public static function getTest(int $enrollId, int $chapterId)
	{
		return static::where('enrollment_id', $enrollId)->where('chapter_id', $chapterId)->first();
	}
}
