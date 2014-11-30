<?php

//use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
//use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

//class User extends Eloquent implements UserInterface, RemindableInterface {
class User extends Eloquent {

    // Timestamps werden standardmässig von Laravel verlangt, überschreiben
    public $timestamps = false;

	//use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

    // default-Werte ändern
	protected $table = 'Users';
    protected $primaryKey = 'ID';
    protected $fillable = ['Name', 'Passwort', 'Email'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
