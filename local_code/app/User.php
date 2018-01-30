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

    public function isATutor() {
        return $this->tutor == 1;
    }

    public function isActive() {
        return $this->active == 1;
    }
}
