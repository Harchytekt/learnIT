<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['course_id', 'body',];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user() // $course->user -- $comment->course->user
    {
        return $this->belongsTo(User::class);
    }
}
