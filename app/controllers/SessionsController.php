<?php

class SessionsController extends BaseController {

    public function create(){
        if(Auth::check()) return Redirect::to('/admin');
        return View::make('sessions.create');
    }

    public function store(){
        //dd(Input::only('Name', 'Passwort'));
        //$password = Hash::make($input['Passwort']);
        //dd(Input::get('Name'));
        //dd($password);
        if (Auth::attempt(Input::only('Passwort', 'Name'))){
            return Auth::user();
            //return "Welcome " . Auth::user()->Name;
        }

        return Redirect::back()->withInput();
    }

    public function destroy(){
        Auth::logout();
        return Redirect::route('sessions.create');
    }

}