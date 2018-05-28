<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Chapter;

class Part extends Model
{
	/**
	 * This function gets the body of the current part.
	 */
	public function getBody()
    {
		$res = "";
		if ($this->type == "quiz" || $this->type == "test") {
			$res .= '<div class="outerQuiz"><div class="quiz"></div></div>
			<script>var data = '.(($this->body !== null && $this->body != '') ? $this->body : '0').';</script>';
		} else {
			$res .= '<div class="editor">'.$this->body.'</div>';
		}
		return $res;
    }

	/**
	 * This function gets a part of a given chapter.
	 *
	 * @var $chapter_id
	 *		The ID of the chapter.
	 * @var $order_id
	 *		The order ID of the part tho get.
	 */
	public static function getPart(int $chapter_id, int $order_id) {
		return static::where('chapter_id', $chapter_id)->where('order_id', $order_id)->first();
    }
}
