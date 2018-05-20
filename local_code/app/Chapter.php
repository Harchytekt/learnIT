<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Part;

class Chapter extends Model
{
    public function isPublished() {
        return $this->published == 1;
    }

    public function getBody()
    {
		$body = Part::getPartsFromChapter($this->id);
		if ($this->part_nb == 1) {
			return $body[0]->body;
		}

		$i = 1;
		$res = "";
		$type = "";
		foreach ($body as $part) {
			$res .= "<div id='".$i."' class='";
			if ($i == 1) {
				$res .= "active part'>";
			} else {
				$res .= "inactive part'>";
			}
			// get type of the part (quiz or theory)
			$type = ($part->type == "quiz") ? "quiz" : "editor";
			$res .= '<div class="'.$type.'">'.$part->body.'</div>';
			$res .= "</div>";
			$i += 1;
		}
		return $res;
    }

	public static function publish(Chapter $chapter) {
		return static::where('id', $chapter->id)->update(['published' => 1]);
	}
}
