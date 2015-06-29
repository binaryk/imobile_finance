<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface; 

class User extends Cartalyst\Sentry\Users\Eloquent\User implements UserInterface, RemindableInterface 
{

    protected $table = 'users';
    protected $hidden = array('password');

    public static function generalValidatorRules($id)
    {
        return [
            'nume'    => 'required',
            'prenume' => 'required',
            'email'   => 'required|email|unique:users,email,' . $id,
            'telefon' => 'required'
        ];
    }

    public static function generalValidatorMessages()
    {
        return [
            'nume.required'    => 'Numele trebuie completat',
            'prenume.required' => 'Prenumele trebuie completat',
            'email.required'   => 'Emailul trebuie completat',
            'email.email'      => 'Introduceţi o adresă de email corectă',
            'telefon.required' => 'Numărul de telefon trebuie completat'
        ];
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    public static function boot()
    {
        self::$hasher = new Cartalyst\Sentry\Hashing\NativeHasher;
    }

    public function isCurrent()
    {
        if (!Sentry::check())
        {
            return false;
        }
        return Sentry::getUser()->id == $this->id;
    }

}