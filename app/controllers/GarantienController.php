<?php

class GarantienController extends \BaseController {

    protected $garantie;

    public function __construct(Wartungsartikelhersteller $garantie){
        $this->garantie = $garantie;
    }

    public function index() {
        $garantien = $this->garantie->all();
        // "Herstellers" von withHerstellers kann in der view als $herstellers verwendet werden
        return View::make('garantien.index')->withGarantien($garantien);
    }

    public function show($name) {
        $garantien = $this->garantie->whereName($name)->first();
        return View::make('garantien.show', ['garantien' => $garantien]);
    }

    public function create() {
        $artikel_options = DB::table('Artikel')->orderBy('Name', 'asc')->lists('Name','ID');
        return View::make('garantien.create', array('artikel_options' => $artikel_options));
    }

    public function store(){

        //dd(Input::all()); // ok

        //$this->artikel = Input::all();
        $this->garantie->Name = Input::get('Name');
        $this->garantie->Beschreibung   = Input::get('Beschreibung');
        $this->garantie->Einkaufspreis  = Input::get('Einkaufspreis');
        $this->garantie->Verkaufspreis  = Input::get('Verkaufspreis');
        $this->garantie->Dauer          = Input::get('Dauer');
        $this->garantie->Artikel_ID     = Input::get('Artikel_ID');
        /*if(!$this->user->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }*/
        $this->garantie->save();

        return Redirect::route('artikel.index');

    }

}
