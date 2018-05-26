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

	public static function getPart(int $chapter_id, int $order_id) {
		return static::where('chapter_id', $chapter_id)->where('order_id', $order_id)->first();
    }

	public function getBody()
    {
		$res = "";
		if ($this->type == "quiz" || $this->type == "test") {
			$res .= '<div class="outerQuiz"><div class="quiz"></div></div>
			<script>var data = '.(($this->body !== null) ? $this->body : '0').';</script>';
		} else {
			$res .= '<div class="editor">'.$this->body.'</div>';
		}
		return $res;
    }
}
