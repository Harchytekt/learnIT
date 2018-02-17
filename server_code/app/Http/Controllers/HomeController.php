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
        $favIDs = Favorite::getAllFavorites(); // Array of favorites courses IDs
        $favs = Course::getCourseFromIDArray($favIDs);

        $enrIDs = Enrollment::getAllEnrollments(); // Array of favorites courses IDs
        $enrs = Course::getCourseFromIDArray($enrIDs);

        return view('authenticated.accueil', compact('favs', 'enrs'));
    }
}
