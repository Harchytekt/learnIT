<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Course extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user() // $course->user -- $comment->course->user
    {
        return $this->belongsTo(User::class);
    }

    public static function getCourseFromIDArray($IDArray) {
        foreach ($IDArray as $i => $value) {
            if ($i == 0) {
                $collection = collect(static::where('id', $value)->get());
            } else {
                $collection = $collection->concat(static::where('id', $value)->get());
            }
        }
        return $collection->sortBy('name');
    }

    public function isEnrollment() {
        return in_array($this->id, Enrollment::getAllEnrollments());
    }

    public function isFavorite() {
        return in_array($this->id, Favorite::getAllFavorites());
    }

    public function hasComments() {
        return $this->comments->count() != 0;
    }
}
