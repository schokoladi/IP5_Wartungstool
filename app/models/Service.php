<?php

/*
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;*/

// Eloquent = Object Relational Mapper -> query data in db
class Service extends Eloquent {

    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    // Datenbankname in der Mehrzahl
    protected $table = 'Services';
    protected $primaryKey = 'ID';

    // Dies ist notwendig für die Regelabfrage
    protected $fillable = ['Artikelnummer', 'Titel', 'Preis'];

    public static $rules = [
        'Artikelnummer' => 'required',
        'Titel'         => 'required',
        'Preis'         => 'required'
    ];

    public static $messages = [
        'required' => '<span class="error">*</span>'
    ];

    public $errors;

    public function isValid(){

        $validation = Validator::make($this->attributes, static::$rules, static::$messages);
        if($validation->passes()) return true;
        $this->errors = $validation->messages();

        return false;
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

}