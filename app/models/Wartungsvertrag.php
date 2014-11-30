<?php

/*
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;*/

// Eloquent = Object Relational Mapper -> query data in db
class Wartungsvertrag extends Eloquent {

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Wartungsvertraege';
    protected $primaryKey = 'ID';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

}