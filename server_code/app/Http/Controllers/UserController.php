<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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

    public function index() {
        return view('authenticated.compte');
    }

    public function updateEmail() {
        $user = User::find(Auth::user()->id);

        $rules = User::$rules;
        $rules['email'] = $rules['email'].','.Auth::user()->id;
        $validation = Validator::make(['email' => request('email'),], $rules);

        /*dd($validation->passes(),
            $validationCertificate->messages(),
            ['email' => request('email')],
            $rules
        );*/

        if ($validation->passes()) {
            $user->email = request('email');
            $user->save();
            $message = "L'adresse email a été modifiée avec succès !";
        } else {
            $message = "L'adresse n'a pas pu être modifiée.";
        }

        return redirect('/compte')->withMessage($message);
    }
}
