<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public static $rules = ['email' => 'required|email|unique:users,email'];

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

    public function getName() {
        if ($this->lastname != '' || $this->firstname != '') {
            return  $this->lastname.' '.$this->firstname;
        } else {
            return $this->names[array_rand($this->names)];
        }
    }

    public function isATutor() {
        return $this->tutor == 1;
    }

    public function isActive() {
        return $this->active == 1;
    }
}
