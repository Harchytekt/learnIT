<?php

namespace App\Http\Controllers;

use App\Course;
use App\Comment;

class CommentController extends Controller
{
    public function store(Course $course)
    {
        $this->validate(request(), ['body' => 'required|min:2']);

        auth()->user()->publishComment(
            new Comment([
                'body' => request('body'),
                'course_id' => $course->id // Don't forget to add post_id in $fillable (Model)
            ])
        );

        return back();
    }
}
