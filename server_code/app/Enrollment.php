<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Enrollment extends Model
{
    public static function numberOfEnrollments() {
        return static::where('student_id', Auth::user()->id)->count();
    }

    public static function getAllEnrollments() {
        return static::where('student_id', Auth::user()->id)
            ->pluck('course_id')->toArray();
    }
}
