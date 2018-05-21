<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Part;

class Chapter extends Model
{
    public function isPublished() {
        return $this->published == 1;
    }

	public static function publish(Chapter $chapter) {
		return static::where('id', $chapter->id)->update(['published' => 1]);
	}
}
