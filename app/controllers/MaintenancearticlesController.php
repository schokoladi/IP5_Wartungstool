<?php

class MaintenancearticlesController extends \BaseController {

    protected $maintenancearticle;

    public function __construct(Maintenancearticle $maintenancearticle){
        $this->maintenancearticle = $maintenancearticle;
    }

    public function index() {
        $maintenancearticles = $this->maintenancearticles->all();
        return View::make('maintenancearticles.index')->withMaintenancearticles($maintenancearticles);
    }

    public function show($title) {
        $maintenancearticles = $this->maintenancearticles->whereTitel($title)->first();
        return View::make('maintenancearticles.show', ['maintenancearticles' => $maintenancearticles]);
    }

    public function create() {
        $maintenance_options    = DB::table('Wartungsvertraege')->orderBy('Titel', 'asc')->lists('Titel','ID');
        $manufacturer_options   = DB::table('Artikelhersteller')->orderBy('Name', 'asc')->lists('Name','ID');
        $article_options        = DB::table('Artikel')->orderBy('Name', 'asc')->lists('Name','ID');
        return View::make('maintenancearticles.create', array(
            'maintenance_options' => $maintenance_options,
            'manufacturer_options' => $manufacturer_options,
            'article_options' => $article_options
        ));
    }

    public function store(){

        //dd(Input::all());

        if(!$this->maintenancearticle->fill(Input::all())->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->maintenancearticle->errors);
        }
        // Es tritt ein Fehler auf, wenn nur save() aufgerufen wird.
        // Werte müssen nochmals in das Objekt gespeichert werden
        else {
            $this->maintenancearticle->Titel                = Input::get('Titel');
            $this->maintenancearticle->Seriennummer         = Input::get('Seriennummer');
            $this->maintenancearticle->Beschreibung         = Input::get('Beschreibung');
            $this->maintenancearticle->Kaufdatum            = Input::get('Kaufdatum');
            $this->maintenancearticle->Verrechnet           = FALSE;
            $this->maintenancearticle->Wartungsvertraege_ID = Input::get('Wartungsvertraege_ID');
            $this->maintenancearticle->Artikel_ID           = Input::get('Artikel_ID');
            $this->maintenancearticle->save();
            dd($this->maintenancearticle);
            //return Redirect::route('maintenancearticles.create');
        }

    }

}
