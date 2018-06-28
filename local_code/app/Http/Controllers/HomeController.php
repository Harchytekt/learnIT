<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Enrollment;
use App\Favorite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favs = '';
        $enrs = '';
        $favIDs = Favorite::getAllFavorites(); // Array of favorites courses IDs
        if (Favorite::getNumberOfFavorites() != 0) {
            $favs = Course::getCourseFromIDArray($favIDs);
        }

        $enrIDs = Enrollment::getAllEnrollments(); // Array of enrollments courses IDs
        if (Enrollment::getNumberOfEnrollments() != 0) {
            $enrs = Course::getCourseFromIDArray($enrIDs);
        }

        return view('authenticated.accueil', compact('favs', 'enrs'));
    }
}
