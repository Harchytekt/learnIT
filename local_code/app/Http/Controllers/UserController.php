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

	/**
	 * Delete the account of the current user.
	 */
    public function destroy() {
        $user = User::find(Auth::user()->id);

        Auth::logout();

        if ($user->delete()) {
            session()->flash('flash_message', 'Le compte a été correctement supprimé.');
            session()->flash('flash_type', 'alert-success');
            return redirect('/');
        } else {
            session()->flash('flash_message', 'Le compte n\'a pas pu être supprimé.');
            session()->flash('flash_type', 'alert-danger');
            return redirect('/');
        }
    }

	/**
	 * Show the 'import a user list' help page.
	 */
	public function help()
	{
		return view('authenticated.help');
	}

	/**
	 * Show the account view.
	 */
    public function index() {
        return view('authenticated.compte');
    }

	/**
	 * Save the user list into the database.
	 *
	 * @var $request
	 *		The request contains the user list.
	 */
	public function storeUsersList(Request $request)
	{
		$nbOfCreatedUsers = 0;
		$nbOfGivenUsers = 0;
		$createdUser = [];
		$existingUsernames = [];
		$existingEmails = [];
		$existingBoth = [];
		$state;

		foreach (json_decode($request->userList) as $user) {
			if ($user->firstname !== '') {
				$nbOfGivenUsers++;

				$state = User::alreadyExist($user->firstname.$user->lastname, $user->email);
				if ($state != 0) {
					if ($state == 1) {
						$existingUsernames[] = $user->firstname.$user->lastname;
					} elseif ($state == 2) {
						$existingEmails[] = $user->email;
					} else {
						$existingBoth[] = [$user->firstname.$user->lastname, $user->email];
					}
				} else {
					$nbOfCreatedUsers++;
					$createdUser[] = [$user->firstname.$user->lastname, $user->email];
					User::createNew($user->firstname, $user->lastname, $user->email);
				}
			}
		}
		$arrayInfo = [$nbOfCreatedUsers, $nbOfGivenUsers, $createdUser, $existingUsernames, $existingEmails, $existingBoth];

		return $arrayInfo;
	}

	/**
	 * Update the email of the current user.
	 */
    public function updateEmail() {
        $user = User::find(Auth::user()->id);

        $rules = User::$rules;
        $rules['email'] = $rules['email'].','.Auth::user()->id;
        $validation = Validator::make(['email' => request('email'),], ['email' => $rules['email']]);

        if ($validation->passes()) {
            $user->email = request('email');
            $user->save();
            $message = "L'adresse email a été modifiée avec succès !";
        } else {
            $message = "L'adresse n'a pas pu être modifiée.";
        }

        return redirect('/compte')->withMessage($message);
    }

	/**
	 * Update the first and last names of the current user.
	 */
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

	/**
	 * Update the password of the current user.
	 */
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
}
