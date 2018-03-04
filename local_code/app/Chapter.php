<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function isPublished() {
        return $this->published == 1;
    }
}
