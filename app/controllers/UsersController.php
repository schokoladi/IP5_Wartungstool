<?php

class UsersController extends \BaseController {

    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function index() {
        $users = $this->user->all();
        return View::make('users.index')->withUsers($users);
    }

    public function show($name) {
        $user = $this->user->whereName($name)->first();
        return View::make('users.show', ['user' => $user]);
    }

    public function create() {
        return View::make('users.create');
    }

    public function store(){

        $input = Input::all();
        // Notwendig, damit das PW als Hash in der DB gespeichert wird
        $input['Passwort'] = Hash::make($input['Passwort']);
        if(!$this->user->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }
        $this->user->save();

        return Redirect::route('users.index');
    }

}
