<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/', function(){

    $wvertr = DB::table('Wartungsvertraege')->get();
    return $wvertr;
    //$vertraege = DB::select('select * from Wartungsvertraege');

    //dd($vertraege);
    /*$wv1 = new Wartungsvertrag;
    $wv1->Titel = 'Test1 Eloquent';
    $wv1->Beschreibung = 'pipapo';
    $wv1->save();*/



});