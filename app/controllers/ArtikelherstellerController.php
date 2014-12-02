<?php

class ArtikelherstellerController extends \BaseController {

    protected $hersteller;

    public function __construct(Artikelhersteller $hersteller){
        $this->hersteller = $hersteller;
    }

    public function index() {
        $herstellers = $this->hersteller->all();
        // "Herstellers" von withHerstellers kann in der view als $herstellers verwendet werden
        return View::make('hersteller.index')->withHerstellers($herstellers);
    }

    public function show($name) {
        $hersteller = $this->hersteller->whereName($name)->first();
        return View::make('hersteller.show', ['hersteller' => $hersteller]);
    }

    public function create() {
        return View::make('hersteller.create');
    }

    public function store(){

        //dd(Input::get('Name')); // ok

        $this->hersteller->Name = Input::get('Name');
        /*if(!$this->user->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }*/
        $this->hersteller->save();

        return Redirect::route('artikel.create');

    }

}
