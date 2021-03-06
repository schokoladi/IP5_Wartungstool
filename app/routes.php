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

// root-Seite -> PagesController.php funktion home
Route::get('/', 'PagesController@home');

// so wird auf der /about-Seite PagesController.php mit der fkt about aufgerufen
Route::get('/about', 'PagesController@about');
Route::get('/create', 'PagesController@create');
Route::get('/show', 'PagesController@show');
Route::get('/edit', 'PagesController@edit');
Route::get('/table', 'PagesController@table');

// Blade Test ('seite, welche aufgerufen wird') localhost/about
//Route::get('users', 'UsersController@index');
//Route::get('users/{name}', 'UsersController@show');

Route::resource('users', 'UsersController');
Route::resource('customers', 'CustomersController');

Route::resource('manufacturers', 'ManufacturersController');
Route::resource('articles','ArticlesController');
Route::resource('warranties', 'WarrantiesController');

// Routes für die Verwaltung von Wartungsverträgen
Route::resource('maintenance', 'MaintenanceController');
Route::resource('maintenancearticles', 'MaintenancearticlesController');
Route::resource('services', 'ServicesController');

Route::resource('sessions', 'SessionsController');
// Spezielle routes für login und logout zum SessionsController
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::get('admin', function(){
    return 'Admin page';
})->before('auth');

// Einfacher DB-Zugriff
//Route::get('/',  function(){
    //$users = DB::table('Users')->get(); // holt alle
    //$user = DB::table('Users')->find(1); // Holt id=1, funktioniert nicht..
    //$users = DB::table('Users')->where('Name', '=', 'Dominik')->get();

    // Mit ORM NEW
    /*$user = new User;
    $user->Name = 'Jan';
    $user->Passwort = Hash::make('qwer1234');
    $user->save();*/

    // Update nice es funktioniert
    /*$user = User::find(2);
    $user->Name = 'Jan Schnider';
    $user->Email = 'jan.schnider@students.fhnw.ch';
    $user->save();*/

    // delete
    //$user = User::find(2);
    //$user->delete();

    // Für POST-Werte
    /*User::create([
        'Name' => 'Jan',
        'Passwort' => Hash::make('qwer1234')
    ]);*/

    //return User::orderBy('Name', 'asc')->get(); // Sortierung
    //return User::orderBy('Name', 'asc')->take(2)->get(); // die ersten 2

    //$users = User::where('Name', '=', 'Dominik')->get(); // mit Bedingung
    //$user = User::find(1); // jetzt ok
    //return $user;

    //User::all();

//});
