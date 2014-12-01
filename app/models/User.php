<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;
    // Timestamps werden standardmässig von Laravel verlangt, überschreiben
    public $timestamps = false;

    // default-Werte ändern
	protected $table = 'Users';
    protected $primaryKey = 'ID';
    protected $fillable = ['Name', 'Passwort'];

    public static $rules = [
        'Name' => 'required',
        'Passwort' => 'required'
    ];

    public $errors;

    public function isValid(){

        $validation = Validator::make($this->attributes, static::$rules);

        if($validation->passes()) return true;

        $this->errors = $validation->messages();

        return false;
    }

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
