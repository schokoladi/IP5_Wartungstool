<?php

class WarrantiesController extends \BaseController {

    protected $warranty;

    public function __construct(Warranty $warranty){
        $this->warranty = $warranty;
    }

    public function index() {
        $warranties = $this->warranty->all();
        // "Herstellers" von withHerstellers kann in der view als $herstellers verwendet werden
        return View::make('warranties.index')->withWarranties($warranties);
    }

    public function show($name) {
        $warranties = $this->warranty->whereName($name)->first();
        return View::make('warranties.show', ['warranties' => $warranties]);
    }

    public function create() {
        $artikel_options = DB::table('Artikel')->orderBy('Name', 'asc')->lists('Name','ID');
        return View::make('warranties.create', array('artikel_options' => $artikel_options));
    }

    public function store(){

        //dd(Input::all());

        if(!$this->warranty->fill(Input::all())->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->warranty->errors);
        }
        // Es tritt ein Fehler auf, wenn nur save() aufgerufen wird.
        // Werte müssen nochmals in das Objekt gespeichert werden
        else {
            $this->warranty->Name           = Input::get('Name');
            $this->warranty->Beschreibung   = Input::get('Beschreibung');
            $this->warranty->Einkaufspreis  = Input::get('Einkaufspreis');
            $this->warranty->Verkaufspreis  = Input::get('Verkaufspreis');
            $this->warranty->Dauer          = Input::get('Dauer');
            $this->warranty->Artikel_ID     = Input::get('Artikel_ID');
            $this->warranty->save();

            return Redirect::route('articles.index');
        }

    }

}
