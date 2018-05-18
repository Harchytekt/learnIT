<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Chapter;

class Part extends Model
{
	public static function getPartsFromChapter(int $chapter_id) {
        $collection = collect(static::where('chapter_id', $chapter_id)->get());
        return $collection;
    }
}
