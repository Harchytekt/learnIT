<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Hash;

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

    public function updateNames() {
        $user = User::find(Auth::user()->id);

        $rules = User::$rules;
        $validationFirstname = Validator::make(['firstname' => request('firstname'),],
            ['firstname' => $rules['name']]);
        $validationLastname = Validator::make(['lastname' => request('lastname')],
            ['lastname' => $rules['name']]);

        if (!$validationFirstname->passes() && !$validationLastname->passes()) {
            $message = "Les modifications n'ont pas pu être effectuées.";
            return redirect('/compte')->withMessage($message);
        }
        if ($validationFirstname->passes()) {
            $user->firstname = request('firstname');
        }
        if ($validationLastname->passes()) {
            $user->lastname = request('lastname');
        }

        $user->save();
        $message = "Les modifications ont été effectuées avec succès !";
        return redirect('/compte')->withMessage($message);
    }

    public function updateEmail() {
        $user = User::find(Auth::user()->id);

        $rules = User::$rules;
        $rules['email'] = $rules['email'].','.Auth::user()->id;
        $validation = Validator::make(['email' => request('email'),], ['email' => $rules['email']]);

        /*dd($validation->passes(),
            $validation->messages(),
            ['email' => request('email')],
            ['email' => $rules['email']]
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

    public function updatePassword() {
        $user = User::find(Auth::user()->id);

        $rules = User::$rules;
        $validation = Validator::make(['password_old' => request('password_old'),
            'password' => request('password'),
            'password_confirmation' => request('password_confirmation'),], ['password' => $rules['password']]);

        if (!Hash::check(request('password_old'), $user->password)) {
            $message = "L'ancien mot de passe est incorrect.";
        } else if (request('password_old') == request('password')) {
            $message = "Les mots de passe doivent être différents.";
        } else if ($validation->passes()) {
            $user->password = bcrypt(request('password'));
            $user->save();
            $message = "Le mot de passe a été modifié avec succès !";
        } else {
            $message = "Le mot de passe n'a pas pu être modifié.";
        }

        return redirect('/compte')->withMessage($message);
    }

    public function destroy() {
        $user = User::find(Auth::user()->id);

        Auth::logout();

        if ($user->delete()) {
            session()->flash('flash_message', 'Le compte a été correctement supprimé.');
            session()->flash('flash_type', 'alert-dismissible alert-success');
            return redirect('/');
        } else {
            session()->flash('flash_message', 'Le compte n\'a pas pu être supprimé.');
            session()->flash('flash_type', 'alert-dismissible alert-danger');
            return redirect('/');
        }
    }
}
