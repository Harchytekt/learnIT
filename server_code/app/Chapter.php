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
		foreach ($body as $part) {
			$res .= "<div id='".$i."' class='";
			if ($i == 1) {
				$res .= "active part'>";
			} else {
				$res .= "inactive part'>";
			}
			$res .= $part->body;
			$res .= "</div>";
			$i += 1;
		}
		return $res;
    }
}
