<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mail;
use App\Notifications\MailPasswordInitToken;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Used to convert the dates columns to instances of Carbon.
     * Thanks to this, we can use diffForHumans(), toFormattedDateString(),...
     *
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'lastLogin_at'
    ];

    protected $names = ['Monsieur X', 'Monsieur Dupont', 'Monsieur Durand', 'Monsieur Tout-le-monde', 'Monsieur Tartempion', 'Monsieur Michu',
        'Madame X', 'Madame Dupont', 'Madame Durand', 'Madame Tout-le-monde', 'Madame Michu',
        'Joe Bleau', 'Joe Bloggs', 'Tommy Atkins', 'John Smith', 'John Doe',
        'Ann Yone', 'Jane Smith', 'Jane Doe'
    ];

    public static $rules = [
        'name' => 'string|min:2|max:32|regex:/([A-Z][a-z]+([ ]?[a-z]?[\'-]?[A-Z][a-z]+)*)/',
        'password' => 'required|string|min:6|max:20|regex:/(^([A-z\d\*$_#%-])*$)/u|confirmed',
        'email' => 'required|email|unique:users,email',

    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'lastname', 'firstname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

	/**
	 * This function is used to return the state of the user.
	 *
	 * @var $username
	 *		The username oof the new user (firstname + lastname).
	 * @var $email
	 *		The email of the new user.
	 * @return 0 if doesn't exist;
	 *			1 if username already exists;
	 *			2 if email already exists and
	 *			3 if username & email already exist.
	 */
	public static function alreadyExist(string $username, string $email)
	{
		$nbOfUsername = (new User)->where('username', $username)->count();
		$nbOfEmail = (new User)->where('email', $email)->count();

		$state = 0;

		if ($nbOfUsername !== 0) {
			$state += 1;
		}
		if ($nbOfEmail !== 0) {
			$state += 2;
		}

		return $state;
	}

	/**
	 * This function is used to create a new user.
	 *
	 * @var $firstname
	 *		The firstname of the new user.
	 * @var $lastname
	 *		The lastname of the new user.
	 * @var $email
	 *		The email of the new user.
	 */
	public static function createNew(string $firstname, string $lastname, string $email)
	{
		$user = new User;

		$user->username = $firstname.$lastname;
		$user->email = $email;
		$user->firstname = $firstname;
		$user->lastname = $lastname;
		$user->password = bcrypt(request($user->createRandomPassword($firstname, $lastname)));
        $user->save();

		User::sendPasswordInitMail($user);
	}

	/**
	 * This functions creates a random password.
	 * It's created with the firstname,
	 * the number of letters in the lastname and
	 * 1 special character.
	 *
	 * @var $firstname
	 *		The firstname of the new user.
	 * @var $lastname
	 *		The lastname of the new user.
	 */
	public function createRandomPassword(string $firstname, string $lastname)
	{
		$chars = ["*", "'", "$", "_", "#", "%", "-"];
		$res = '';
		do {
			$res .= $firstname;
		} while (strlen($res) <= 17);

		if (strlen($firstname) > 17) {
			$res = subtr($firstname, 0, 17);
		}
		$res .= strlen($lastname).$chars[rand(0, count($chars) - 1)];

		return $res;
	}

	/**
	 * This function is used to get the first and last name of the user.
	 */
    public function getName() {
        if ($this->lastname != '' || $this->firstname != '') {
            return  $this->firstname.' '.$this->lastname;
        } else {
            return $this->names[array_rand($this->names)];
        }
    }

	/**
	 * This function is used to return if the user is a tutor or not.
	 */
    public function isATutor() {
		return Course::getWrittenCourses($this->id)->count() > 0;
    }

	/**
	 * This function is used to save and publish comments.
	 *
	 * @var $comment
	 *		The comment to save and publish
	 */
    public function publishComment(Comment $comment)
    {
        $this->courses()->save($comment);
    }

	/**
	 * Send a password reset email to the user
	 */
	public static function sendPasswordInitMail(User $user)
	{
		// Generate a new reset password token
		$token = app('auth.password.broker')->createToken($user);

		// Send email
		Mail::send('mailBienvenue', ['user' => $user, 'token' => $token], function ($m) use ($user) {
			$m->from('noreply@learnit.dev', 'learnIT');
			$m->to($user->email, $user->firstname.' '.$user->lastname)->subject('Bienvenue sur learnIT');
		});
	}
}
