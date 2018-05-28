<?php

namespace App\Http\Controllers;

use App\Course;
use App\Comment;

class CommentController extends Controller
{
	/**
	 * Save the comment into the database.
	 *
	 * @var $course
	 *		The course to which the comment will be added 
	 */
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
