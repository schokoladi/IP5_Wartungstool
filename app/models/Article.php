<?php

/*
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;*/

// Eloquent = Object Relational Mapper -> query data in db
class Article extends Eloquent {

    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    // Datenbankname und Primärschlüssel
    protected $table = 'Artikel';
    protected $primaryKey = 'ID';

    // Dies ist notwendig für die Regelabfrage
    protected $fillable = ['Artikelnummer', 'Name', 'Einkaufspreis', 'Verkaufspreis'];

    public static $rules = [
        'Artikelnummer' => 'required|unique:Artikel',
        'Name'          => 'required|unique:Artikel',
        'Einkaufspreis' => 'required',
        'Verkaufspreis' => 'required'
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