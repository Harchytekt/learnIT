<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Favorite extends Model
{
    public static function numberOfFavorites() {
        return static::where('student_id', Auth::user()->id)->count();
    }

    public static function getAllFavorites() {
        return static::where('student_id', Auth::user()->id)
            ->pluck('course_id')->toArray();
    }
}
