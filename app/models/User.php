<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	use UserTrait, RemindableTrait;
	protected $table = 'users';
	protected $fillable = [
	'nume',
	'prenume',
	'password',
	'adresa',
	'telefon',
	'email' 
	];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
