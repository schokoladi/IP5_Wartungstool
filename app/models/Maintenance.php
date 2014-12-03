<?php

/*
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;*/

// Eloquent = Object Relational Mapper -> query data in db
class Maintenance extends Eloquent {

    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Wartungsvertraege';
    protected $primaryKey = 'ID';

    // Dies ist notwendig für die Regelabfrage
    protected $fillable = ['Vertragsnummer', 'Titel'];

    public static $rules = [
        'Vertragsnummer'     => 'required|unique:Wartungsvertraege',
        'Titel'              => 'required'
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

}