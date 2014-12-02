<?php

class ArtikelherstellerController extends \BaseController {

    protected $hersteller;

    public function __construct(Artikelhersteller $hersteller){
        $this->hersteller = $hersteller;
    }

    public function index() {
        $herstellers = $this->hersteller->all();
        return View::make('hersteller.index')->withHersteller($herstellers);
    }

    public function show($name) {
        $hersteller = $this->hersteller->whereName($name)->first();
        return View::make('hersteller.show', ['hersteller' => hersteller]);
    }

    public function create() {
        return View::make('hersteller.create');
    }

    public function store(){

        dd($this->hersteller->fill(Input::all()));
        /*if(!$this->user->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }*/
        $this->hersteller->save();

        //return Redirect::route('hersteller.index');
    }

}
