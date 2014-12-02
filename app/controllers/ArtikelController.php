<?php

class ArtikelController extends \BaseController {

    protected $artikel;

    public function __construct(Artikel $artikel){
        $this->artikel = $artikel;
    }

    public function index() {
        $artikels = $this->artikel->all();
        // "Herstellers" von withHerstellers kann in der view als $herstellers verwendet werden
        return View::make('artikel.index')->withArtikels($artikels);
    }

    public function show($name) {
        $artikel = $this->artikel->whereName($name)->first();
        return View::make('artikel.show', ['artikel' => $artikel]);
    }

    public function create() {
        $hersteller_options = DB::table('Artikelhersteller')->orderBy('Name', 'asc')->lists('Name','ID');
        return View::make('artikel.create', array('hersteller_options' => $hersteller_options));
    }

    public function store(){

        //dd(Input::all()); // ok

        //$this->artikel = Input::all();
        $this->artikel->Artikelnummer           = Input::get('Artikelnummer');
        $this->artikel->Name                    = Input::get('Name');
        $this->artikel->Beschreibung            = Input::get('Beschreibung');
        $this->artikel->Einkaufspreis           = Input::get('Einkaufspreis');
        $this->artikel->Verkaufspreis           = Input::get('Verkaufspreis');
        $this->artikel->Artikelhersteller_ID    = Input::get('Artikelhersteller_ID');
        /*if(!$this->user->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }*/
        $this->artikel->save();

        return Redirect::route('garantien.create');

    }

}
