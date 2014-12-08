<?php

class ServicesController extends \BaseController {

    protected $maintenance;

    public function __construct(Service $service){
        $this->service = $service;
    }

    public function index() {
        $services = $this->service->all();
        return View::make('services.index')->withServices($services);
    }

    public function show($name) {
        $service = $this->service->whereTitel($name)->first();
        return View::make('services.show', ['service' => $service]);
    }

    public function create() {

        $maintenance_id         = Input::get('maintenance_id');
        $maintenance_options    = DB::table('Wartungsvertraege')->orderBy('Titel', 'asc')->lists('Titel', 'ID');

        return View::make('services.create', [
            'maintenance_id'        => $maintenance_id,
            'maintenance_options'   => $maintenance_options
        ]);

    }

    public function store()
    {

        if(!$this->service->fill(Input::all())->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->service->errors);
        }
        // Es tritt ein Fehler auf, wenn nur save() aufgerufen wird.
        // Werte müssen nochmals in das Objekt gespeichert werden
        else {
            $this->service->Artikelnummer = Input::get('Artikelnummer');
            $this->service->Titel = Input::get('Titel');
            $this->service->Beschreibung = Input::get('Beschreibung');
            $this->service->Verrechnet = FALSE;
            //$this->service->Kaufdatum = Input::get('Kaufdatum');
            $this->service->Preis = Input::get('Preis');
            $this->service->Wartungsvertraege_ID = Input::get('Wartungsvertraege_ID');
            $this->service->save();

            $maintenance_id = DB::table('Wartungsvertraege')->where('ID', Input::get('Wartungsvertraege_ID'))->pluck('ID');
            return Redirect::route('services.create',  ['maintenance_id' => $maintenance_id]);
        }

    }

}
