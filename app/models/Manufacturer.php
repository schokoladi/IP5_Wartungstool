<?php

/*
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;*/

// Eloquent = Object Relational Mapper -> query data in db
class Manufacturer extends Eloquent {

    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    // Datenbankname
    protected $table = 'Artikelhersteller';
    protected $primaryKey = 'ID';

    // Dies ist notwendig für die Regelabfrage
    protected $fillable = ['Name'];

    public static $rules = [
        'Name'      => 'required|unique:Artikelhersteller'
    ];

    public static $messages = [
        'required' => '<span class="error">*Pflichtfeld</span>'
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